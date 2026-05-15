import { useJsonLdSchema } from '@/composables/useJsonLdSchema';

export interface FaqSchemaItem {
    question: string;
    answer: string;
}

export function useFaqSchema(items: FaqSchemaItem[]): void {
    useJsonLdSchema({
        '@type': 'FAQPage',
        mainEntity: items.map(({ question, answer }) => ({
            '@type': 'Question',
            name: question,
            acceptedAnswer: { '@type': 'Answer', text: answer },
        })),
    });
}
