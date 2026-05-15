import { onMounted, onUnmounted } from 'vue';

export function useJsonLdSchema(schema: Record<string, unknown>): void {
    let el: HTMLScriptElement | null = null;

    onMounted(() => {
        el = document.createElement('script');
        el.type = 'application/ld+json';
        el.textContent = JSON.stringify({ '@context': 'https://schema.org', ...schema });
        document.head.appendChild(el);
    });

    onUnmounted(() => {
        el?.remove();
        el = null;
    });
}
