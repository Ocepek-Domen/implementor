import { onMounted, onUnmounted } from 'vue';
import type { Ref } from 'vue';
import gsap from 'gsap';
import theme from '@/theme';

export interface MagneticOptions {
    radius?: number;
    strength?: number;
}

export function useMagneticButton(elementRef: Ref<HTMLElement | null>, options: MagneticOptions = {}) {
    const { radius = 80, strength = 0.4 } = options;

    let el: HTMLElement | null = null;
    let wasInRadius = false;
    let rippleEl: HTMLDivElement | null = null;

    function getCenter(): { cx: number; cy: number } | null {
        if (!el) return null;
        const rect = el.getBoundingClientRect();
        return { cx: rect.left + rect.width / 2, cy: rect.top + rect.height / 2 };
    }

    function onDocMouseMove(e: MouseEvent): void {
        if (!el) return;
        const center = getCenter();
        if (!center) return;

        const { cx, cy } = center;
        const dx = e.clientX - cx;
        const dy = e.clientY - cy;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance <= radius) {
            const moveX = Math.max(-12, Math.min(12, dx * strength));
            const moveY = Math.max(-12, Math.min(12, dy * strength));

            gsap.to(el, { x: moveX, y: moveY, duration: 0.1, ease: 'none' });

            const inner = el.querySelector('[data-magnetic-inner]') as HTMLElement | null;
            if (inner) {
                // 30ms lag on inner label creates a rubberband feel
                setTimeout(() => {
                    gsap.to(inner, { x: moveX * 0.5, y: moveY * 0.5, duration: 0.1, ease: 'none' });
                }, 30);
            }

            wasInRadius = true;
        } else if (wasInRadius) {
            gsap.to(el, { x: 0, y: 0, ...theme.gsap.spring });

            const inner = el.querySelector('[data-magnetic-inner]') as HTMLElement | null;
            if (inner) {
                gsap.to(inner, { x: 0, y: 0, ...theme.gsap.spring });
            }

            wasInRadius = false;
        }
    }

    function onClick(e: MouseEvent): void {
        if (!el) return;

        if (rippleEl) {
            rippleEl.remove();
            rippleEl = null;
        }

        const rect = el.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const size = Math.max(rect.width, rect.height) * 2.5;

        rippleEl = document.createElement('div');
        Object.assign(rippleEl.style, {
            position: 'absolute',
            borderRadius: '50%',
            background: 'rgba(255,255,255,0.25)',
            width: '0px',
            height: '0px',
            left: `${x}px`,
            top: `${y}px`,
            transform: 'translate(-50%, -50%)',
            pointerEvents: 'none',
        });

        if (getComputedStyle(el).position === 'static') {
            el.style.position = 'relative';
        }
        el.style.overflow = 'hidden';
        el.appendChild(rippleEl);

        gsap.to(rippleEl, {
            width: size,
            height: size,
            opacity: 0,
            duration: 0.3,
            ease: 'none',
            onComplete: () => {
                rippleEl?.remove();
                rippleEl = null;
            },
        });
    }

    onMounted(() => {
        el = elementRef.value;
        if (!el) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        document.addEventListener('mousemove', onDocMouseMove);
        el.addEventListener('click', onClick);
    });

    onUnmounted(() => {
        document.removeEventListener('mousemove', onDocMouseMove);
        if (el) el.removeEventListener('click', onClick);
        if (rippleEl) {
            rippleEl.remove();
            rippleEl = null;
        }
        el = null;
    });
}
