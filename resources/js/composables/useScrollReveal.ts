import { onMounted, onUnmounted } from 'vue';
import type { Ref } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import theme from '@/theme';

gsap.registerPlugin(ScrollTrigger);

export interface ScrollRevealOptions {
    delay?: number;
    once?: boolean;
}

export function useScrollReveal(elementRef: Ref<HTMLElement | null>, options: ScrollRevealOptions = {}) {
    const { delay = 0, once = true } = options;
    let st: ScrollTrigger | null = null;

    onMounted(() => {
        const el = elementRef.value;
        if (!el) return;

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            gsap.set(el, { opacity: 1, y: 0, scale: 1 });
            return;
        }

        gsap.set(el, { opacity: 0, y: 40, scale: 0.96 });

        let triggered = false;

        st = ScrollTrigger.create({
            trigger: el,
            onEnter: () => {
                if (once && triggered) return;
                triggered = true;
                gsap.to(el, { opacity: 1, y: 0, scale: 1, delay, ...theme.gsap.spring });
            },
            onEnterBack: () => {
                if (once) return;
                gsap.to(el, { opacity: 1, y: 0, scale: 1, delay, ...theme.gsap.spring });
            },
            onLeaveBack: () => {
                if (once) return;
                gsap.to(el, { opacity: 0, y: 40, scale: 0.96, duration: 0.3, ease: 'none' });
            },
        });
    });

    onUnmounted(() => {
        st?.kill();
        st = null;
    });
}
