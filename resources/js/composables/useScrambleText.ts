import { onUnmounted } from 'vue';
import type { Ref } from 'vue';

export interface ScrambleOptions {
    duration?: number;
    charset?: string;
}

const DEFAULT_CHARSET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()+-=[]|;:,.?';

export function useScrambleText(
    elementRef: Ref<HTMLElement | null>,
    finalText: string,
    options: ScrambleOptions = {},
) {
    const { duration = 600, charset = DEFAULT_CHARSET } = options;
    let rafId: number | null = null;

    function scramble(): void {
        const el = elementRef.value;
        if (!el) return;

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            el.textContent = finalText;
            return;
        }

        stop();

        const chars = Array.from(finalText);
        const startTime = performance.now();
        const frameInterval = 1000 / 30;
        let lastFrameTime = 0;

        function frame(now: number): void {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);

            if (now - lastFrameTime >= frameInterval || progress === 1) {
                lastFrameTime = now;

                const resolvedCount = Math.floor(progress * chars.length);
                const display = chars
                    .map((char, i) => {
                        if (char === ' ') return ' ';
                        if (i < resolvedCount) return char;
                        return charset[Math.floor(Math.random() * charset.length)];
                    })
                    .join('');

                el.textContent = display;
            }

            if (progress < 1) {
                rafId = requestAnimationFrame(frame);
            } else {
                rafId = null;
            }
        }

        rafId = requestAnimationFrame(frame);
    }

    function stop(): void {
        if (rafId !== null) {
            cancelAnimationFrame(rafId);
            rafId = null;
        }
    }

    onUnmounted(stop);

    return { scramble, stop };
}
