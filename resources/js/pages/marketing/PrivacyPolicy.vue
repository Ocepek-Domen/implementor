<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Politika zasebnosti" />

    <div class="bg-bg-light text-text-light dark:bg-bg-dark dark:text-text-dark">
        <!-- Header -->
        <div class="border-b border-text-light/10 py-16 dark:border-white/10">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-primary">
                    Pravni dokumenti
                </p>
                <h1 class="font-display text-4xl font-semibold tracking-tight text-text-light dark:text-text-dark sm:text-5xl">
                    Politika zasebnosti
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
                    <h2>1. Upravljavec osebnih podatkov</h2>
                    <p>
                        Upravljavec osebnih podatkov je <strong>Implementor d.o.o.</strong>,
                        Tržaška cesta 2, 1000 Ljubljana, [PLACEHOLDER: matična številka], [PLACEHOLDER: davčna številka].
                    </p>
                    <p>
                        Kontakt za vprašanja v zvezi z varstvom osebnih podatkov:
                        <a href="mailto:info@implementor.si">info@implementor.si</a>
                    </p>
                    <p class="placeholder-note">
                        [PLACEHOLDER: Preverite z odvetnikom, ali ste kot upravljavec dolžni imenovati pooblaščeno osebo za varstvo podatkov (DPO). Glede na obseg obdelave za B2B konzultantsko podjetje to najverjetneje ni obvezno.]
                    </p>
                </section>

                <section>
                    <h2>2. Kateri osebni podatki se zbirajo</h2>
                    <p>Zbiramo naslednje kategorije osebnih podatkov:</p>

                    <h3>2.1 Podatki iz kontaktnega obrazca</h3>
                    <p>
                        Ko izpolnite obrazec za brezplačen posvet, zbiramo: ime in priimek,
                        ime podjetja, e-poštni naslov, telefonsko številko (neobvezno),
                        velikost podjetja, namen povpraševanja ter morebitno sporočilo.
                        Ob oddaji obrazca zabeležimo tudi IP-naslov pošiljatelja.
                    </p>

                    <h3>2.2 Tehnični podatki ob obisku spletnega mesta</h3>
                    <p>
                        Naši strežniki samodejno beležijo standardne dnevniške podatke:
                        IP-naslov, vrsto brskalnika, operacijski sistem, referenčni URL in čas dostopa.
                        [PLACEHOLDER: Preverite, kako dolgo strežnik hrani dnevniške datoteke (npr. 30 dni).]
                    </p>

                    <h3>2.3 Piškotki in sledilne tehnologije</h3>
                    <p>
                        S piškotki in podobnimi tehnologijami zbiramo podatke o uporabi
                        spletnega mesta, opisane v razdelku 8 (Piškotki).
                    </p>
                </section>

                <section>
                    <h2>3. Nameni in pravna podlaga obdelave</h2>

                    <h3>3.1 Obravnava povpraševanj</h3>
                    <p>
                        Podatke iz kontaktnega obrazca obdelujemo z namenom odgovora na vaše
                        povpraševanje in morebitne nadaljnje komunikacije v zvezi s ponudbo naših storitev.
                        Pravna podlaga: <strong>izvajanje pogodbe oziroma predpogodbeni ukrepi</strong>
                        (čl. 6(1)(b) GDPR) in <strong>zakoniti interes</strong> (čl. 6(1)(f) GDPR).
                    </p>

                    <h3>3.2 Analitika spletnega mesta</h3>
                    <p>
                        Podatke o obisku spletnega mesta obdelujemo z namenom izboljšanja vsebine
                        in uporabniške izkušnje.
                        Pravna podlaga: <strong>privolitev</strong> (čl. 6(1)(a) GDPR),
                        ki jo podate prek pasice za piškotke.
                    </p>

                    <h3>3.3 Tržno komuniciranje</h3>
                    <p>
                        [PLACEHOLDER: Opišite, ali pošiljate kakršne koli tržne e-poštne sporoke.
                        Če ne, ta pododdelek izbrišite.]
                    </p>
                </section>

                <section>
                    <h2>4. Hramba osebnih podatkov</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Kategorija podatkov</th>
                                <th>Rok hrambe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Povpraševanja prek kontaktnega obrazca</td>
                                <td>[PLACEHOLDER: npr. 2 leti od prejema]</td>
                            </tr>
                            <tr>
                                <td>Strežniški dnevniki</td>
                                <td>[PLACEHOLDER: npr. 30 dni]</td>
                            </tr>
                            <tr>
                                <td>Analitični piškotki (GA4)</td>
                                <td>Do 2 leti (upravljano s strani Google)</td>
                            </tr>
                            <tr>
                                <td>Podatki o privolitvi za piškotke</td>
                                <td>[PLACEHOLDER: npr. 1 leto]</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        Po preteku roka hrambe podatke izbrišemo ali anonimiziramo, razen
                        če zakonodaja zahteva daljšo hrambo.
                    </p>
                </section>

                <section>
                    <h2>5. Prejemniki osebnih podatkov</h2>
                    <p>Vaših podatkov ne prodajamo tretjim osebam. Podatke posredujemo le naslednjim kategorijam obdelovalcev:</p>
                    <ul>
                        <li>
                            <strong>Ponudnik gostovanja spletnega mesta</strong> —
                            [PLACEHOLDER: ime ponudnika, država], za namene delovanja strežnika.
                        </li>
                        <li>
                            <strong>Google LLC</strong> (prek Google Tag Manager in Google Analytics 4) —
                            za spletno analitiko, zgolj ob vaši privolitvi. Google se nahaja v ZDA;
                            prenos poteka na podlagi ustreznih zaščitnih ukrepov (standardne pogodbene klavzule).
                        </li>
                        <li>
                            <strong>Meta Platforms Ireland Ltd.</strong> (Meta Pixel) —
                            za oglaševalske namene, zgolj ob vaši privolitvi.
                        </li>
                        <li>
                            <strong>Ponudnik e-poštnih storitev</strong> —
                            [PLACEHOLDER: ime ponudnika], za dostavo obvestil o povpraševanjih.
                        </li>
                    </ul>
                    <p>
                        Vsi obdelovalci so zavezani k obdelovanju podatkov izključno po naših navodilih
                        in v skladu z GDPR.
                    </p>
                </section>

                <section>
                    <h2>6. Prenos podatkov v tretje države</h2>
                    <p>
                        Nekateri prejemniki (Google LLC, Meta Platforms) se nahajajo v Združenih državah
                        Amerike. Prenos vaših podatkov v te države poteka na podlagi standardnih
                        pogodbenih klavzul (SCC) v skladu s čl. 46(2)(c) GDPR.
                        [PLACEHOLDER: Preverite veljavne mehanizme prenosa ob času objave.]
                    </p>
                </section>

                <section>
                    <h2>7. Vaše pravice</h2>
                    <p>V skladu z GDPR in ZVOP-2 imate naslednje pravice:</p>
                    <ul>
                        <li><strong>Pravica do dostopa</strong> — zahtevate lahko potrditev, ali obdelujemo vaše podatke, in kopijo teh podatkov.</li>
                        <li><strong>Pravica do popravka</strong> — zahtevate lahko popravek netočnih ali dopolnitev nepopolnih podatkov.</li>
                        <li><strong>Pravica do izbrisa</strong> — zahtevate lahko izbris osebnih podatkov, kadar ni zakonite podlage za nadaljnjo hrambo.</li>
                        <li><strong>Pravica do omejitve obdelave</strong> — zahtevate lahko omejitev obdelave v določenih primerih (npr. med preverjanjem točnosti podatkov).</li>
                        <li><strong>Pravica do prenosljivosti podatkov</strong> — zahtevate lahko izročitev vaših podatkov v strojno berljivem formatu.</li>
                        <li><strong>Pravica do ugovora</strong> — ugovarjate lahko obdelavi, ki temelji na zakonitem interesu.</li>
                        <li><strong>Pravica do preklica privolitve</strong> — kadarkoli prekličete privolitev za obdelavo, ki temelji na privolitvi, brez vpliva na zakonitost pred preklicem.</li>
                    </ul>
                    <p>
                        Zahtevo za uveljavljanje pravic pošljite na:
                        <a href="mailto:info@implementor.si">info@implementor.si</a>.
                        Na zahtevo bomo odgovorili v roku enega meseca.
                    </p>
                    <p>
                        Če menite, da vaše pravice niso bile spoštovane, imate pravico vložiti pritožbo pri
                        <strong>Informacijskem pooblaščencu RS</strong>
                        (<a href="https://www.ip-rs.si" target="_blank" rel="noopener">www.ip-rs.si</a>),
                        Dunajska cesta 22, 1000 Ljubljana.
                    </p>
                </section>

                <section>
                    <h2>8. Piškotki</h2>
                    <p>
                        Spletno mesto implementor.si uporablja piškotke. Ob prvem obisku vas prosimo
                        za privolitev prek pasice za piškotke v skladu z ZEKom-2.
                    </p>

                    <h3>Nujno potrebni piškotki</h3>
                    <p>
                        Zagotavljajo osnovno delovanje spletnega mesta (seja, varnostni žeton CSRF).
                        Ne zahtevajo privolitve.
                    </p>

                    <h3>Analitični piškotki</h3>
                    <p>
                        Google Analytics 4 (prek Google Tag Manager) — beležijo anonimne podatke
                        o obisku (strani, čas, vir prometa). Aktivirajo se le ob vaši privolitvi.
                    </p>

                    <h3>Tržni piškotki</h3>
                    <p>
                        Meta Pixel — za merjenje učinkovitosti oglasov. Aktivira se le ob vaši privolitvi.
                    </p>

                    <p>
                        Privolitvene nastavitve lahko kadarkoli spremenite s klikom na
                        [PLACEHOLDER: gumb/povezavo za upravljanje piškotkov v nogi strani].
                    </p>
                </section>

                <section>
                    <h2>9. Varnost podatkov</h2>
                    <p>
                        Izvajamo primerne tehnične in organizacijske ukrepe za zaščito osebnih podatkov
                        pred nepooblaščenim dostopom, razkritjem, spremembo ali uničenjem,
                        vključno s šifriranjem prenosa podatkov (HTTPS) in omejitvijo dostopa do podatkov.
                    </p>
                </section>

                <section>
                    <h2>10. Spremembe politike zasebnosti</h2>
                    <p>
                        Politiko zasebnosti lahko občasno posodobimo. Datum zadnje posodobitve
                        je naveden na vrhu tega dokumenta. Ob bistvenih spremembah vas bomo
                        obvestili prek spletnega mesta.
                    </p>
                </section>

                <section>
                    <h2>11. Kontakt</h2>
                    <p>
                        Za vsa vprašanja v zvezi z varstvom osebnih podatkov nas kontaktirajte:
                    </p>
                    <address>
                        Implementor d.o.o.<br>
                        Tržaška cesta 2, 1000 Ljubljana<br>
                        <a href="mailto:info@implementor.si">info@implementor.si</a>
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

.prose-legal table {
    @apply w-full border-collapse text-sm;
}

.prose-legal th {
    @apply border border-text-light/20 bg-text-light/5 px-4 py-2 text-left font-semibold text-text-light dark:border-white/20 dark:bg-white/5 dark:text-text-dark;
}

.prose-legal td {
    @apply border border-text-light/20 px-4 py-2 text-text-light/70 dark:border-white/20 dark:text-text-dark/70;
}

.placeholder-note {
    @apply rounded border border-amber-300/50 bg-amber-50/50 px-4 py-3 text-xs text-amber-800 dark:border-amber-600/30 dark:bg-amber-900/20 dark:text-amber-300;
}
</style>
