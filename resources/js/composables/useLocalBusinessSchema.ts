import { useJsonLdSchema } from '@/composables/useJsonLdSchema';

export function useLocalBusinessSchema(): void {
    useJsonLdSchema({
        '@type': ['LocalBusiness', 'ProfessionalService'],
        name: 'Implementor d.o.o.',
        url: 'https://implementor.si',
        email: 'hello@implementor.si',
        telephone: '+386 00 000 000',
        image: 'https://implementor.si/images/logo.png',
        priceRange: '€€',
        address: {
            '@type': 'PostalAddress',
            addressLocality: 'Ljubljana',
            addressCountry: 'SI',
        },
        areaServed: { '@type': 'Country', name: 'Slovenia' },
        sameAs: [
            'https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192',
            'https://www.linkedin.com/company/implementor',
        ],
    });
}
