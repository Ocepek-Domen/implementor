<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Pogoji uporabe" />

    <div class="bg-bg-light text-text-light dark:bg-bg-dark dark:text-text-dark">
        <!-- Header -->
        <div class="border-b border-text-light/10 py-16 dark:border-white/10">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-primary">
                    Pravni dokumenti
                </p>
                <h1 class="font-display text-4xl font-semibold tracking-tight text-text-light dark:text-text-dark sm:text-5xl">
                    Pogoji uporabe
                </h1>
                <p class="mt-4 text-sm text-text-light/50 dark:text-text-dark/50">
                    Datum zadnje posodobitve: 16. maj 2026
                </p>
            </div>
        </div>

        <!-- Content -->
        <div class="mx-auto max-w-3xl px-6 py-16 lg:px-8">
            <div class="prose-legal">

                <section>
                    <h2>1. Splošne določbe</h2>
                    <p>
                        Ti pogoji uporabe urejajo dostop do spletnega mesta
                        <strong>implementor.si</strong> (v nadaljevanju: spletno mesto) in
                        njegovo uporabo. Upravljavec spletnega mesta je
                        <strong>Implementor d.o.o.</strong>,
                        [PLACEHOLDER: naslov], [PLACEHOLDER: matična številka].
                    </p>
                    <p>
                        Z dostopom do spletnega mesta sprejemate te pogoje v celoti.
                        Če s pogoji ne soglašate, spletnega mesta ne uporabljajte.
                    </p>
                    <p>
                        Spletno mesto je namenjeno predstavitvi storitev podjetja Implementor d.o.o.
                        in zbiranju povpraševanj potencialnih poslovnih strank. Ne gre za
                        spletno trgovino ali platformo za sklepanje pravno zavezujočih pogodb.
                    </p>
                </section>

                <section>
                    <h2>2. Intelektualna lastnina</h2>
                    <p>
                        Vsa vsebina na spletnem mestu — besedila, grafike, logotipi, ikone,
                        fotografije in programska koda — je last podjetja Implementor d.o.o.
                        ali njegovih pogodbenih partnerjev in je zaščitena z avtorskim pravom
                        ter drugimi zakoni o intelektualni lastnini.
                    </p>
                    <p>
                        Vsebine ni dovoljeno reproducirati, distribuirati, javno prikazovati
                        ali drugače uporabljati brez predhodnega pisnega soglasja upravljavca,
                        razen za zasebno, nekomercialno ogledovanje.
                    </p>
                </section>

                <section>
                    <h2>3. Omejitev odgovornosti</h2>
                    <p>
                        Informacije na spletnem mestu so splošne narave in ne predstavljajo
                        pravnega, davčnega ali svetovalnega mnenja. Kljub skrbi za točnost
                        vsebine ne jamčimo za popolnost ali aktualnost objavljenih informacij.
                    </p>
                    <p>
                        Implementor d.o.o. ne odgovarja za:
                    </p>
                    <ul>
                        <li>morebitne napake ali pomanjkljivosti v vsebini spletnega mesta,</li>
                        <li>kakršno koli neposredno ali posredno škodo, ki bi nastala z uporabo ali nezmožnostjo uporabe spletnega mesta,</li>
                        <li>vsebino zunanjih spletnih mest, na katera vodijo povezave s tega spletnega mesta.</li>
                    </ul>
                    <p>
                        [PLACEHOLDER: Preverite z odvetnikom, ali ta omejitev odgovornosti ustreza veljavni slovenski zakonodaji za vaš konkreten primer.]
                    </p>
                </section>

                <section>
                    <h2>4. Zunanje povezave</h2>
                    <p>
                        Spletno mesto lahko vsebuje povezave do zunanjih spletnih mest
                        (npr. Odoo partner directory, LinkedIn). Te povezave so namenjene
                        zgolj vaši informiranosti. Implementor d.o.o. nima nadzora nad
                        vsebino zunanjih mest in ne prevzema odgovornosti za njihovo vsebino,
                        pravilnost ali razpoložljivost.
                    </p>
                </section>

                <section>
                    <h2>5. Razpoložljivost spletnega mesta</h2>
                    <p>
                        Trudimo se zagotoviti neprekinjeno delovanje spletnega mesta,
                        vendar ne jamčimo za stalno razpoložljivost. Spletno mesto je
                        lahko začasno nedostopno zaradi vzdrževalnih del, tehničnih
                        motenj ali višje sile.
                    </p>
                </section>

                <section>
                    <h2>6. Veljavno pravo in reševanje sporov</h2>
                    <p>
                        Za razlago in izvajanje teh pogojev se uporablja pravo
                        <strong>Republike Slovenije</strong>. Za reševanje sporov, ki bi
                        nastali v zvezi z uporabo spletnega mesta, je pristojno sodišče
                        v <strong>Ljubljani</strong>.
                    </p>
                    <p>
                        [PLACEHOLDER: Preverite, ali želi vaše podjetje predvideti kakšno obliko
                        alternativnega reševanja sporov (mediacija, arbitraža).]
                    </p>
                </section>

                <section>
                    <h2>7. Spremembe pogojev</h2>
                    <p>
                        Pogoje uporabe lahko kadar koli spremenimo. Datum zadnje posodobitve
                        je naveden na vrhu tega dokumenta. Z nadaljnjo uporabo spletnega mesta
                        po objavi sprememb sprejemate posodobljene pogoje.
                    </p>
                </section>

                <section>
                    <h2>8. Kontakt</h2>
                    <p>
                        Za vprašanja v zvezi s temi pogoji nas kontaktirajte:
                    </p>
                    <address>
                        Implementor d.o.o.<br>
                        [PLACEHOLDER: naslov]<br>
                        <a href="mailto:hello@implementor.si">hello@implementor.si</a>
                    </address>
                </section>

            </div>
        </div>
    </div>
</template>

<style scoped>
@reference "../../../css/app.css";

.prose-legal {
    @apply space-y-10 text-sm leading-7 text-text-light/80 dark:text-text-dark/80;
}

.prose-legal section {
    @apply space-y-4;
}

.prose-legal h2 {
    @apply text-xl font-semibold text-text-light dark:text-text-dark;
}

.prose-legal h3 {
    @apply text-base font-semibold text-text-light dark:text-text-dark;
}

.prose-legal p {
    @apply leading-7;
}

.prose-legal ul {
    @apply ml-6 list-disc space-y-2;
}

.prose-legal address {
    @apply not-italic leading-7;
}

.prose-legal a {
    @apply text-primary underline-offset-2 hover:underline;
}
</style>
