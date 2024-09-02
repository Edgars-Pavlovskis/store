@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')


@section('title', 'Privātuma politika')
@section('og_title', 'Privātuma politika')

@section('content')

<style>
    .axil-privacy-policy p {
        margin-bottom: 20px;
    }
    .axil-privacy-policy ul {
        margin-bottom: 35px;
    }
    .axil-privacy-policy ul.nobm {
        margin-bottom: 15px;
    }
</style>

  <!-- Start Breadcrumb Area  -->
  <div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="/">Sākums</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">Privātuma politika</li>
                    </ul>
                    <h1 class="title">Privātuma politika</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('assets/img/privacy.png')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start Privacy Policy Area  -->
<div class="axil-privacy-area axil-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="axil-privacy-policy">
                    <span class="policy-published">Pamatojoties uz Personas datu aizsardzības regulu Nr.2016/679.</span>
                    <h4 class="title">Personas datu apstrāde</h4>
                    <p>SIA “ALBA-LTD” vāc, apstrādā, glabā, kopīgo, dzēš un aizsargā klienta personas datus, pamatojoties uz Personas datu aizsardzības regulu Nr.2016/679 un citiem LR spēkā esošiem normatīviem aktiem.</p>
                    <p>Saskaņā ar spēkā esošajiem normatīvajiem aktiem, kuri pārvalda fizisko personu datu apstrādes sistēmu, SIA “ALBA-LTD” ievēro šādus principus:
                        <ul class="list">
                            <li>SIA “ALBA-LTD” nodrošina likumīgu, godprātīgu personas datu apstrādi;</li>
                            <li>Saņemto personas datu apstrāde tiek veikta noteiktiem mērķiem;</li>
                            <li>Saņemtie personas dati ir adekvāti, atbilstīgie;</li>
                            <li>Saņemtie personas dati ir precīzi;</li>
                            <li>Saņemtie personas dati netiek saglabāti ilgāk nekā nepieciešams un tiek likvidēti sasniedzot noteikto mērķi;</li>
                            <li>SIA “ALBA-LTD” apstrādā personas datus ievērojot fizisko personu tiesības;</li>
                            <li>SIA “ALBA-LTD” nodrošina personas datus glabāšanu drošībā;</li>
                            <li>SIA “ALBA-LTD” nesniedz saņemtos personas datus citiem uzņēmumiem ievērojot drošu, adekvātu aizsardzību, pamatojoties un ievērojot LR spēkā esošiem normatīviem aktiem un Personas datu aizsardzības regulu Nr.2016/679.</li>
                        </ul>
                    </p>


                    <h4 class="title">Privātuma politika</h4>
                    <p>Privātuma politika attiecas uz ikviena klienta personas datu apstrādi un klientam piedāvāto pakalpojumu. Privātuma politika sniedz informāciju par to, kā SIA “ALBA-LTD” vāc, apstrādā, glabā, kopīgo, dzēš un aizsargā klienta personas datus. SIA “ALBA-LTD” nodrošina likumīgu, godprātīgu klienta personas datu apstrādi.</p>

                    <h4 class="title"></h4>
                    <p>Personas datu kategorijas ir atkarīgas no klienta izmantotajiem pakalpojumiem un produktiem. SIA “ALBA-LTD” ir tiesīga apstrādāt šādas personas datu kategorijas:
                        <ul class="list">
                            <li>Dati, kurus klients pats paziņo SIA “ALBA-LTD”;</li>
                            <li>Vārds, uzvārds, personas kods vai dzimšanas datums;</li>
                            <li>Korespondences adrese, telefona numurs, e-pasta adrese;</li>
                            <li>Bankas dati;</li>
                            <li>Videonovērošanas ieraksti un attēli;</li>
                            <li>Komunikācijas dati. Informācija no e-pasta adreses – vēstules, kas ir saistīti ar klienta komunikāciju ar kompāniju;</li>
                            <li>Sīkdatnes – dati par SIA “ALBA-LTD” interneta vietnes apmeklēšanu.</li>
                        </ul>
                    </p>
                    <p>Ja klients nevēlas atļaut izmantot sīkdatnes, klients var to izdarīt savas pārlūkprogrammas uzstādījumos, tomēr tādā gadījumā vietnes lietošana var būt ierobežota:
                        <ul class="list">
                            <li>Dati, laiks, interneta pārlūkošanas apjoms.</li>
                        </ul>
                    </p>

                    <h4 class="title">Personas datu apstrādes pamats</h4>
                    <ul class="list">
                        <li>Klienta piekrišana. Klients, kā personas datu subjekts, pats dod piekrišanu (subjekta piekrišana) personas datu vākšanai un apstrādei noteiktiem mērķiem klienta piekrišana ir viņa brīva griba un patstāvīgs lēmums, kas var tikt sniegts/atsaukts jebkurā brīdī, tādējādi atļaujot SIA “ALBA-LTD” apstrādāt personas datus. Piekrišanas atsaukums neietekmē apstrādes likumību vai saņemto pakalpojumu kvalitāti, kas pamatojas uz piekrišanu pirms atsaukuma.</li>
                        <li>SIA “ALBA-LTD” leģitīmas intereses, kuru pamatā ir kvalitatīvu pakalpojumu piedāvājums. SIA “ALBA-LTD” ir tiesības apstrādāt klienta personas datus tādā apjomā, kāds tam ir objektīvi nepieciešams un pietiekams, lai nodrošinātu savlaicīgu, kvalitatīvu, ērtu apkalpošanu. Kā arī SIA “ALBA-LTD” iekšējo procesu izveidošanai un atbalstam.</li>
                        <li>SIA “ALBA-LTD” juridisko pienākumu izpilde. SIA “ALBA-LTD” ir tiesīga apstrādāt klienta personas datus, lai izpildītu normatīvo aktu prasības, lai sniegtu atbildes uz valsts un pašvaldības likumīgiem pieprasījumiem.</li>
                        <li>Līguma noslēgšana un izpilde. Lai klientam sniegtu kvalitatīvus pakalpojumus un apkalpošanu, SIA “ALBA-LTD” apkopo un apstrādā noteiktus personas datus, kas tiek savākti pirms līguma noslēgšanas vai jau noslēgtā līguma laikā.</li>
                        <li>Sabiedrības interešu īstenošana vai oficiālo pilnvaru izpildīšana. SIA “ALBA-LTD” ir tiesīga apstrādāt personas datus. Šādos gadījumos pamats personas datu apstrādei ir iekļauts un aprakstīts normatīvajos aktos.</li>
                        <li>Apstrādājot Klienta personas datus, SIA “ALBA-LTD” var veikt profilēšanu, lai piešķirtu bonusus, lai sūtītu automatizētus individuālus piedāvājumus, kuri tiek piedāvāti tikai biznesa nolūkos un neradīs klientam tiesiskas sekas.</li>
                    </ul>


                    <h4 class="title">Nolūki personas datus apstrādāšanai</h4>
                    <ul class="list">
                        <li>Līguma noslēgšanai un izpildei ar klientu.</li>
                        <li>Lai novērtētu klienta spēju pildīt līgumsaistības.</li>
                        <li>Efektīvas naudas plūsmas pārvaldīšanai, t.sk., klienta maksājumu un parādu administrēšanai.</li>
                        <li>Tehniskā atbalsta nodrošināšanai saistībā ar sniegtajiem pakalpojumiem.</li>
                        <li>Videonovērošanas drošības nolūkiem un SIA “ALBA-LTD” leģitīmas intereses aizsardzībai (īpašuma drošības nodrošināšanai).</li>
                        <li>Nozares attīstības veicināšanai un jaunu pakalpojumu piedāvājumam.</li>
                        <li>Statistisko datu apstrādei un tirgus analīzes veikšanai.</li>
                    </ul>

                    <h4 class="title">Personas datu iegūšana</h4>
                    <p>SIA “ALBA-LTD” iegūst klienta personas datus, kad klients:
                        <ul class="list">
                            <li>Pierakstās jaunumu saņemšanai no SIA “ALBA-LTD”;</li>
                            <li>Iegādājas un izmanto produktus vai pakalpojumus no SIA “ALBA-LTD”;</li>
                            <li>Piedalās konkursos, loterijās vai aptaujās;</li>
                            <li>Apmeklē vai pārlūko SIA “ALBA-LTD” interneta vietnes;</li>
                            <li>Tiek filmēts ar videonovērošanas iekārtam;</li>
                        </ul>
                    </p>
                    <p>SIA “ALBA-LTD” un to pilnvarotās personas, pamatojoties uz Personas datu aizsardzības regulu Nr.2016/679 ir tiesīga apstrādāt klienta personas datus, kas ir saņemti no trešajām personām (piem., no līzinga kompānijas), ja klients tam ir piekritis.</p>
                    <p>SIA “ALBA-LTD” un to pilnvarotās personas, pamatojoties uz Personas datu aizsardzības regulu Nr.2016/679 ir tiesīga apstrādāt klienta personas datus, kas ir saņemti no klienta.</p>


                    <h4 class="title">Personas datu glabāšanas laikaposms</h4>
                    <p>SIA “ALBA-LTD” ir tiesīga apstrādāt un glabāt personas datus, kamēr:
                        <ul class="list">
                            <li>Kamēr nav atsaukta klienta piekrišana personas datu apstrādei;</li>
                            <li>Nepieciešams termiņš SIA “ALBA-LTD” leģitīmo interešu realizācijai un aizsardzībai;</li>
                            <li>Personas datu glabāšanās termiņš ir noteikts normatīvajos aktos;</li>
                            <li>Ir spēkā līgumsaistības starp klientu un SIA “ALBA-LTD”;</li>
                            <li>Līdz personas datu izmantošanas mērķa sasniegšanai, kas noteikta  to saņemšanas brīdī.</li>
                        </ul>
                    </p>

                    <h4 class="title">Personas datu koplietošana</h4>
                    <p>SIA “ALBA-LTD” sniedz klienta personas datus tikai nepieciešamā un pietiekamā apjomā atbilstoši normatīvo aktu prasībām un ņemot vērā konkrētās situācijas objektīvus apstākļus.</p>
                    <p>Nepieciešamības gadījumā SIA “ALBA-LTD” nodot klienta personas datus SIA “ALBA-LTD” pilnvarotām personām, pamatojoties uz Personas datu aizsardzības regulu Nr.2016/679 un/vai partneriem, aģentiem, pakalpojumu  piegādātājiem, kas iesaistīti klientam pasūtīto vai izmantoto produktu un pakalpojumu kvalitātes nodrošināšanai un uzlabošanai.</p>
                    <p>SIA “ALBA-LTD” ir tiesīga nodot klienta personas datus tiesībsargājošām iestādēm, citām valsts un pašvaldības iestādēm, ja tas izriet no normatīvajiem aktiem vai attiecīgās iestādes informācijas pieprasījuma.</p>


                    <h4 class="title">Personas datu aizsardzība</h4>
                    <p>Lai aizsargātu klienta personas datus no nesankcionētas piekļuves, nejaušas nozaudēšanas, iznīcināšanas vai izpaušanas SIA “ALBA-LTD” pielieto mūsdienu tehnoloģijas, ievēro tehniskas un organizatoriskas prasības.</p>
                    <p>SIA “ALBA-LTD” rūpīgi pārbauda visas pilnvarotās personas, partnerus, aģentus, pakalpojuma sniedzējus, kompānijas darbiniekus, kuri apstrādā klienta personas datus, ka arī izvērtē atbilstošu drošības pasākumu pielietošanu un personas datu glabāšanu atbilstoši normatīvo aktu prasībām.</p>
                    <p>SIA “ALBA-LTD” neuzņemas atbildību par jebkādu nesankcionētu piekļuvi personas datiem un/vai personas datu zudumu, ja tas nav atkarīgs no SIA “ALBA-LTD” (piem., klienta vainas un/vai nolaidības dēļ).</p>


                    <h4 class="title">Klienta tiesības</h4>
                    <ul class="list">
                        <li>Klientam ir tiesības jebkurā brīdī atteikties no komercpaziņojumu saņemšanas un iebilst pret savu personas datu profilēšanu.</li>
                        <li>Piekrišanas atsaukums neietekmē personas datu apstrādes likumību un/vai saņemto pakalpojumu kvalitāti, kas pamatojas uz piekrišanu pirms atsaukuma.</li>
                        <li>Klientam ir tiesības labot visus rīcībā esošos personas datus par sevi.</li>
                        <li>Klientam ir tiesības pieprasīt dzēst vai ierobežot to personas datu apstrādi, kuru apstrāde vairs nav nepieciešama saskaņā ar nolūkiem, kādiem tie tika vākti un apstrādāti (tiesības “Tikt aizmirstam”), sniedzot iesniegumu.</li>
                        <li>Klientam ir tiesības iegūt informāciju par tām fiziskām vai juridiskām personām, kuras ir saņēmušas informāciju par šo klientu.</li>
                        <li>Klientam ir tiesības saņemt vai nodot savus personas datus tālāk citam datu pārzinim (“datu pārnesamība”). Šīs tiesības ietver tikai tos datus, ko klients ir sniedzis SIA “ALBA-LTD”, pamatojoties uz savu piekrišanu vai līgumu, un ja apstrādāšana tiek veikta automatizēti. Lai īstenotu iepriekš minētās tiesības nepieciešams iesniegt rakstveida iesniegumu.</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Privacy Policy Area  -->


@endsection
