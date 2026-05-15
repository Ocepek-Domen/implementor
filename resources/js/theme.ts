/**
 * Centralised animation & design tokens.
 * Import this file in any component or composable that drives motion.
 * Never hardcode easing strings, durations, or stagger values elsewhere.
 */

const theme = {
    easing: {
        /** Entry transitions — fast settle, no bounce. cubic-bezier(0.22, 1, 0.36, 1) */
        easeOutQuart: 'cubic-bezier(0.22, 1, 0.36, 1)',
        /** Spring entries — slight overshoot before settling. cubic-bezier(0.34, 1.56, 0.64, 1) */
        springBounce: 'cubic-bezier(0.34, 1.56, 0.64, 1)',
    },

    /** Stagger offsets between consecutive items in a group (ms) */
    stagger: {
        card: 60,
        section: 80,
        hero: 80,
    },

    /** Canonical animation durations (ms) */
    duration: {
        /** Micro-interactions: hover states, toggles */
        micro: 150,
        /** Scroll-triggered reveals */
        reveal: 500,
        /** Signature moments: hero cipher reveal, split-screen pinned transition */
        signature: 900,
    },

    /** GSAP-specific spring preset — pass spread into gsap.to() tweens */
    gsap: {
        spring: {
            ease: 'back.out(1.4)',
            duration: 0.6,
        },
    },

    /** WebGL noise background constants (hero section) */
    webgl: {
        /** Noise field drift speed — keep low for a "slowly breathing" feel */
        noiseSpeed: 0.0003,
        /** Noise displacement intensity (0–1 scale relative to canvas size) */
        noiseIntensity: 0.15,
    },
} as const;

export type Theme = typeof theme;
export default theme;
