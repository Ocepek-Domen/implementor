import { onMounted, onUnmounted } from 'vue';
import type { Ref } from 'vue';
import gsap from 'gsap';
import theme from '@/theme';

export interface TiltOptions {
    maxTilt?: number;
    perspective?: number;
}

export function use3DTilt(elementRef: Ref<HTMLElement | null>, options: TiltOptions = {}) {
    const { maxTilt = 8, perspective = 800 } = options;
    let el: HTMLElement | null = null;

    function onMouseMove(e: MouseEvent): void {
        if (!el) return;
        const rect = el.getBoundingClientRect();

        // Normalize cursor position to -1..1 relative to element center
        const normalX = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        const normalY = ((e.clientY - rect.top) / rect.height) * 2 - 1;

        const rotateY = normalX * maxTilt;
        const rotateX = -normalY * maxTilt;

        // Shadow shifts opposite to tilt to simulate a light source above
        const shadowX = normalX * 12;
        const shadowY = normalY * 12;

        gsap.to(el, {
            rotateX,
            rotateY,
            transformPerspective: perspective,
            boxShadow: `${shadowX}px ${shadowY + 14}px 36px rgba(0,0,0,0.18)`,
            duration: 0.1,
            ease: 'none',
        });
    }

    function onMouseLeave(): void {
        if (!el) return;
        gsap.to(el, {
            rotateX: 0,
            rotateY: 0,
            boxShadow: '0px 14px 36px rgba(0,0,0,0.08)',
            ...theme.gsap.spring,
        });
    }

    onMounted(() => {
        el = elementRef.value;
        if (!el) return;

        // Skip on touch devices — tilt has no meaning without a pointer
        if ('ontouchstart' in window || navigator.maxTouchPoints > 0) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        el.addEventListener('mousemove', onMouseMove);
        el.addEventListener('mouseleave', onMouseLeave);
    });

    onUnmounted(() => {
        if (el) {
            el.removeEventListener('mousemove', onMouseMove);
            el.removeEventListener('mouseleave', onMouseLeave);
        }
        el = null;
    });
}
