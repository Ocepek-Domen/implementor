import { useJsonLdSchema } from '@/composables/useJsonLdSchema';

export interface BreadcrumbItem {
    name: string;
    url: string;
}

export function useBreadcrumbSchema(items: BreadcrumbItem[]): void {
    useJsonLdSchema({
        '@type': 'BreadcrumbList',
        itemListElement: items.map((item, index) => ({
            '@type': 'ListItem',
            position: index + 1,
            name: item.name,
            item: item.url,
        })),
    });
}
