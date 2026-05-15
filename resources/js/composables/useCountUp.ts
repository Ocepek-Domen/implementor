import { onMounted, onUnmounted } from 'vue';
import type { Ref } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export interface CountUpOptions {
    duration?: number;
    delay?: number;
    /** Suffix to append after the number, e.g. '+', '%' */
    suffix?: string;
    /** Prefix to prepend before the number, e.g. '€' */
    prefix?: string;
    /** Format the number with locale-aware thousands separators */
    format?: boolean;
}

export function useCountUp(
    elementRef: Ref<HTMLElement | null>,
    target: number,
    options: CountUpOptions = {},
): void {
    const { duration = 1.4, delay = 0, suffix = '', prefix = '', format = false } = options;

    let st: ScrollTrigger | null = null;

    function formatNumber(n: number): string {
        const rounded = Math.round(n);
        const str = format ? rounded.toLocaleString('en') : String(rounded);
        return `${prefix}${str}${suffix}`;
    }

    onMounted(() => {
        const el = elementRef.value;
        if (!el) return;

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            el.textContent = formatNumber(target);
            return;
        }

        const proxy = { value: 0 };
        el.textContent = formatNumber(0);

        st = ScrollTrigger.create({
            trigger: el,
            start: 'top 85%',
            onEnter: () => {
                gsap.to(proxy, {
                    value: target * 1.03,
                    duration: duration * 0.7,
                    ease: 'power3.out',
                    delay,
                    onUpdate: () => { el.textContent = formatNumber(proxy.value); },
                    onComplete: () => {
                        gsap.to(proxy, {
                            value: target,
                            duration: duration * 0.3,
                            ease: 'power2.in',
                            onUpdate: () => { el.textContent = formatNumber(proxy.value); },
                        });
                    },
                });
            },
        });
    });

    onUnmounted(() => {
        st?.kill();
        st = null;
    });
}
