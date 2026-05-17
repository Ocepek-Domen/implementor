<script setup lang="ts">
import { onMounted, onUnmounted, ref, watch } from 'vue'
import { Mesh, Program, Renderer, Triangle } from 'ogl'
import theme from '@/theme'

const canvasRef = ref<HTMLCanvasElement | null>(null)
const showCanvas = ref(false)

let rafId: number | undefined
let cleanup: (() => void) | null = null

const mouseTarget = { x: 0.5, y: 0.5 }
const mouseCurrent = { x: 0.5, y: 0.5 }

const VERT = /* glsl */ `
attribute vec2 position;
varying vec2 v_uv;
void main() {
    v_uv = position * 0.5 + 0.5;
    gl_Position = vec4(position, 0.0, 1.0);
}
`

const FRAG = /* glsl */ `
precision highp float;
uniform float u_time;
uniform vec2 u_mouse;
uniform vec2 u_resolution;
varying vec2 v_uv;

float hash(vec2 p) {
    return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453123);
}

float noise(vec2 p) {
    vec2 i = floor(p);
    vec2 f = fract(p);
    vec2 u = f * f * (3.0 - 2.0 * f);
    return mix(
        mix(hash(i),                  hash(i + vec2(1.0, 0.0)), u.x),
        mix(hash(i + vec2(0.0, 1.0)), hash(i + vec2(1.0, 1.0)), u.x),
        u.y
    );
}

float fbm(vec2 p) {
    float v = 0.0;
    float a = 0.5;
    for (int i = 0; i < 6; i++) {
        v += a * noise(p);
        p = p * 2.0 + vec2(1.7, 9.2);
        a *= 0.5;
    }
    return v;
}

void main() {
    // Cursor parallax: shift sampling point ±15px based on mouse position
    vec2 uv = v_uv + (u_mouse - 0.5) * (30.0 / u_resolution);
    vec2 p = uv * 3.5;
    p.x += u_time * 0.18;
    p.y += u_time * 0.12;

    float n1 = fbm(p);
    float n2 = fbm(p * 0.7 + vec2(4.3, 2.1) + u_time * 0.06);

    vec3 base   = vec3(0.059, 0.039, 0.071); // #0F0A12
    vec3 purple = vec3(0.443, 0.294, 0.404); // #714B67
    vec3 lilac  = vec3(0.529, 0.353, 0.482); // #875A7B

    vec3 col = mix(base, purple, smoothstep(0.35, 0.65, n1) * 0.55);
    col = mix(col, lilac, smoothstep(0.55, 0.80, n2) * 0.20);

    // Vignette: darken edges toward base colour
    float vign = 1.0 - smoothstep(0.3, 0.9, length(v_uv - 0.5) * 1.5);
    col *= mix(0.6, 1.0, vign);

    gl_FragColor = vec4(col, 1.0);
}
`

function webGLSupported(): boolean {
    try {
        const c = document.createElement('canvas')
        return !!(c.getContext('webgl') || c.getContext('experimental-webgl'))
    } catch {
        return false
    }
}

watch(canvasRef, (canvas) => {
    if (!canvas) return

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches
    const renderer = new Renderer({ canvas, alpha: false })
    const gl = renderer.gl
    const geometry = new Triangle(gl)
    const prog = new Program(gl, {
        vertex: VERT,
        fragment: FRAG,
        uniforms: {
            u_time: { value: 0 },
            u_mouse: { value: [0.5, 0.5] },
            u_resolution: { value: [window.innerWidth, window.innerHeight] },
        },
    })
    const mesh = new Mesh(gl, { geometry, program: prog })
    renderer.setSize(window.innerWidth, window.innerHeight)

    const startTime = performance.now()

    function draw() {
        if (document.hidden) return
        rafId = requestAnimationFrame(draw)

        mouseCurrent.x += (mouseTarget.x - mouseCurrent.x) * 0.06
        mouseCurrent.y += (mouseTarget.y - mouseCurrent.y) * 0.06
        prog.uniforms.u_mouse.value = [mouseCurrent.x, mouseCurrent.y]

        if (!reducedMotion) {
            prog.uniforms.u_time.value = (performance.now() - startTime) * theme.webgl.noiseSpeed
        }

        renderer.render({ scene: mesh })
    }

    draw()

    const onResize = () => {
        renderer.setSize(window.innerWidth, window.innerHeight)
        prog.uniforms.u_resolution.value = [window.innerWidth, window.innerHeight]
    }

    const onMouseMove = (e: MouseEvent) => {
        mouseTarget.x = e.clientX / window.innerWidth
        mouseTarget.y = 1.0 - e.clientY / window.innerHeight
    }

    const onVisibilityChange = () => {
        if (document.hidden) {
            if (rafId !== undefined) cancelAnimationFrame(rafId)
        } else {
            draw()
        }
    }

    window.addEventListener('resize', onResize)
    window.addEventListener('mousemove', onMouseMove)
    document.addEventListener('visibilitychange', onVisibilityChange)

    cleanup = () => {
        if (rafId !== undefined) cancelAnimationFrame(rafId)
        window.removeEventListener('resize', onResize)
        window.removeEventListener('mousemove', onMouseMove)
        document.removeEventListener('visibilitychange', onVisibilityChange)
    }
})

onMounted(() => {
    if (window.innerWidth >= 768 && webGLSupported()) {
        showCanvas.value = true
    }
})

onUnmounted(() => cleanup?.())
</script>

<template>
    <canvas
        v-if="showCanvas"
        ref="canvasRef"
        class="absolute inset-0 size-full pointer-events-none"
    />
    <div
        v-else
        class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(ellipse 80% 50% at 35% 65%, rgba(113, 75, 103, 0.35) 0%, transparent 55%), radial-gradient(ellipse 50% 40% at 70% 30%, rgba(113, 75, 103, 0.15) 0%, transparent 55%), #0f0a12"
    />
</template>
