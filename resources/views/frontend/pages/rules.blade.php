@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('title', 'Internetveikala lietošanas noteikumi')
@section('og_title', 'Internetveikala lietošanas noteikumi')

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
                        <li class="axil-breadcrumb-item active" aria-current="page">Internetveikala lietošanas noteikumi</li>
                    </ul>
                    <h1 class="title">Interneta veikala vispārīgie lietošanas noteikumi</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('assets/img/rules.png')}}" alt="Image">
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
                    <span class="policy-published" style="margin-bottom: 10px;">Terminu apraksts.</span>
                    <p>
                        <b>Klients</b> – fiziska persona, kura veic pasūtījumus interneta veikalā birojamunskolai.lv un ir pasūtītās Preces saņēmējs. Interneta veikalā birojamunskolai.lv iegādātās Preces Klients izmanto savām personiskajām vajadzībām, savas ģimenes locekļu un tuvinieku vajadzībām vai citiem mērķiem.
                        <br><b>Pārdevējs</b> – birojamunskolai.lv, SIA “ALBA-LTD”.
                        <br><b>Interneta veikals</b> – vietne internetā, kurai ir adrese birojamunskolai.lv. Klientiem interneta veikalā noformēšanai tiek piedāvāta Pārdevēja Prece, kā arī pasūtītās Preces apmaksas un piegādes noteikumi.
                        <br><b>Vietne</b> – birojamunskolai.lv.
                        <br><b>Prece</b> – materiālā vienība, kura atrodas preču apgrozībā un tiek piedāvāta pārdošanai vietnē.
                        <br><b>Pasūtījums</b> – pienācīgā veidā noformēts Klienta pieprasījums vietnē izvēlētās Preces piegādei uz Klienta norādīto adresi.
                    </p>


                    <h4 class="title pt--10">1. Vispārējie noteikumi</h4>
                    <ul class="list">
                        <li>1.1. Vietnes īpašnieks un administrators ir SIA “ALBA-LTD”.</li>
                        <li>1.2. Pasūtot Preci ar interneta veikala birojamunskolai.lv starpniecību, Klients piekrīt Preces pārdošanas noteikumiem (turpmāk tekstā – Noteikumi), kuri izskaidroti zemāk.</li>
                        <li>1.3. Minētie Noteikumi, kā arī Vietnē izvietotā informācija par Preci ir publiska.</li>
                        <li>1.4. Savstarpējās attiecības starp Klientu un Pārdevēju reglamentē Latvijas Republikas likumdošana.</li>
                        <li>1.5. Pārdevējs atstāj sev tiesības veikt grozījumus šajos Noteikumos.</li>
                    </ul>


                    <h4 class="title">2. Reģistrācija</h4>
                    <ul class="list">
                        <li>2.1. Pasūtījuma noformēšana ir pieejama Klientam ar vai bez reģistrācijas vietnē.</li>
                        <li>2.2. Pārdevējs nav atbildīgs par informācijas, kuru Klients norāda reģistrācija formā, precizitāti un ticamību.</li>
                        <li>2.3. Klients apņemas neizpaust savu lietotāja vārdu un paroli, kurus norādīja reģistrācijas formā. Ja Klientam radušās aizdomas par lietotāja vārda vai paroles izpaušanu vai ir radušās aizdomas par to izmantošanu no trešo personu puses, Klients apņemas nekavējoties par to informēt Pārdevēju, nosūtot vēstuli uz info@alba-ltd.lv. Vēstule ir jānosūta no reģistrācijas formā norādītās e-pasta adreses.</li>
                    </ul>


                    <h4 class="title">3. Pasūtījuma noformēšana un tā izpildes termiņi</h4>
                    <ul class="list">
                        <li>3.1. Klients var noformēt Pasūtījumu pa telefonu, e-pasta starpniecību, caur mājas lapu birojamunskolai.lv vai patstāvīgi, norādot Pārdevējam Pasūtījuma noformēšanai nepieciešamo informāciju.</li>
                        <li>3.2. Ja Klients noformē preces Pasūtījumu daudzumā, kas pārsniedz norādītās preces daudzumu Pārdevēja noliktavā, Pārdevējs par to informē Klientu, nosūtot elektronisko vēstuli uz elektronisko adresi, kuru Klients norādīja reģistrācijas laikā. Klientam ir tiesības apmaksāt un saņemt Preci tādā daudzumā, kādā Prece ir pieejama noliktavā vai anulēt doto pozīciju Pasūtījumā vai, kā alternatīvo risinājumu pieņemt pārdevēja priekšlikumu par Pasūtījuma noformēšanas atlikšanu līdz brīdim, kad norādītā Prece būs pieejama Pārdevēja noliktavā nepieciešamā daudzumā. Ja Klients savu lēmumu nav saskaņojis ar Pārdevēju 7 darba dienu laikā, Pārdevējam ir tiesības pilnībā anulēt šo Pasūtījumu.</li>
                        <li>3.3. Preces saņemšanas termiņš ir atkarīgs no Pasūtījuma savlaicīgas apmaksas no Klienta puses, no piegādes veida, reģiona un adreses, no attiecīgā piegādes dienesta darba, kurš nodrošina šā Pasūtījuma piegādi un nav tieši atkarīgs no Pārdevēja.</li>
                        <li>3.4. Vietnē izvietoti informācijas materiāli nevar pilnībā atspoguļot preces īpašības (tajā skaitā arī krāsu, izmērus, tehniskos parametrus, formu). Pirms Pasūtījuma noformēšanas Klientam ir tiesības vērsties pie Pārdevēja ar Preces detaļu precizēšanu. Ja klients nav vērsies pie Pārdevēja pēc detalizētiem skaidrojumiem, uzskatāms, ka Klientam, noformējot Pasūtījumu, nav radušās šaubas par Preces īpašībām.</li>
                        <li>3.5. Gadījumā, kad Preces nav Pārdevēja noliktavā vajadzīgajā daudzumā, tajā skaitā no Pārdevēja neatkarīgo iemeslu dēļ, Pārdevējam ir tiesības anulēt doto pozīciju Klienta Pasūtījumā, informējot par to Klientu, nosūtot paziņojumu uz elektroniskā pasta adresi, kuru Klients ir norādījis, reģistrējoties vietnē.</li>
                        <li>3.6. Gadījumos, kad klients atsakās no daļēji vai pilnībā apmaksāta, bet neizsūtīta Pasūtījuma, anulētā Pasūtījuma summa tiek atgriezta Klientam.</li>
                        <li>3.7. Interneta veikala birojamunskolai.lv ievietotajiem Preču aprakstiem ir tikai informatīvs raksturs un dotās informācijas izmantošana nerada juridiskās saistības starp apmeklētāju un Pārdevēju. Preces apraksts var neatbilst Klienta informatīvo pieprasījumu kritērijiem.</li>
                        <li>3.8. Interneta veikala birojamunskolai.lv īpašnieki nenes atbildību par fotoattēlu krāsu parametru nodošanu Klienta displejā.</li>
                    </ul>

                    <h4 class="title">4. Piegāde</h4>
                    <ul class="list">
                        <li>4.1. Preces piegāde tiek veikta uz visiem Latvijas reģioniem.</li>
                        <li>4.2. Lai Prece tiktu Klientam piegādāta pēc iespējas ātrāk, Pārdevējs dara visu, kas no tā ir atkarīgs. Tomēr, informējam, ka ir iespējami Preces piegādes kavējumi no Pārdevēja neatkarīgo iemeslu dēļ.</li>
                        <li>4.3. Preces nozaudēšanas vai bojājuma risks pāriet uz Klientu brīdī, kad Klients saņem Pasūtījumu.</li>
                        <li>4.4. Gadījumos, kad Prece nav piegādāta Klientam, tās nozaudēšanas pasta (kurjerpasta) dienesta darbinieku vainas dēļ piegādes brīdī, Pārdevējs atlīdzina Klientam apmaksātās Preces vērtību tikai pēc tam, kad Pārdevējs ir saņēmis no pasta dienesta nozaudēšanas apliecinājumu vai kompensāciju.</li>
                        <li>4.5. Katras Preces piegādes vērtības aprēķins tiek veikts, aprēķinot konkrētas Preces vai visa Pasūtījuma svaru, piegādes reģionu un veidu un tiek norādīts vietnē pēdējā Pasūtījuma noformēšanas etapā.</li>
                        <li>4.6 Pasūtījums tiek piegādāts Klientam vai personai, kura norādīta Pasūtījumā, kā šī Pasūtījuma saņēmējs.</li>
                    </ul>


                    <h4 class="title">5. Preces apmaksa</h4>
                    <ul class="list">
                        <li>5.1. Preces cena tiek norādīta vietnē. Gadījumā, ja tika norādīta nepareiza pasūtītās Preces cena, Pārdevējs pie pirmās iespējas informē Klientu, lai anulētu vai apstiprinātu Klienta Pasūtījumu. Ja sazināties ar Klientu nav iespējams, minētais Pasūtījums tiek uzskatīts par anulētu. Ja Pasūtījums tika apmaksāts, Pārdevējs atgriež apmaksas summu.</li>
                        <li>5.2. Pasūtījums tiek pieņemts tālākai apstrādei tikai pēc visas Pasūtījuma vērtības summas apmaksas Pārdevējam. Pasūtītā Prece tiek rezervēta 24 stundas.</li>
                        <li>5.3. Pārdevējam ir tiesības piešķirt Klientam Precei atlaides un piedāvāt Klientam piedalīties bonusu programmās. Pārdevējs ir tiesīgs tās grozīt vienpusējā kārtībā.</li>
                    </ul>

                    <h4 class="title">6. Preces atgriešana</h4>
                    <ul class="list">
                        <li>6.1. Klientam ir tiesības atteikties no pasūtītas Preces 14 dienu laikā no tās saņemšanas.</li>
                    </ul>


                    <h4 class="title">7. Intelektuālais īpašums</h4>
                    <ul class="list">
                        <li>7.1. Visas vietnē publicētās tekstuālās informācijas un grafisko attēlu kopēšana ir aizliegta. Vietnē izvietotie zīmoli, preču zīmju nosaukumi un logotipi pieder to īpašniekiem.</li>
                    </ul>

                    <h4 class="title">8. Garantijas un atbildība</h4>
                    <ul class="list">
                        <li>8.1. Pārdevējs nenes atbildību par Klientam radušos zaudējumu, kas radušies Preces nepareizas lietošanas rezultātā.</li>
                        <li>8.2. Pārdevējs nenes atbildību par ārējo vietņu saturu un funkcionalitāti.</li>
                        <li>8.3. Pārdevējam ir tiesības atdot vai kādā citā veidā nodot savas tiesības un pienākumus savstarpējās attiecībās ar Klientu trešajām personām.</li>
                        <li>8.4. Preču aprakstiem interneta veikalā birojamunskolai.lv ir vienīgi informatīvs raksturs, un šīs informācijas izmantošana nerada juridisko pienākumu izveidošanos starp apmeklētāju un interneta veikala īpašnieku. Preces apraksta precizitāte var neatbilst Klienta informatīvā pieprasījuma kritērijiem.</li>
                        <li>8.5. Interneta veikala birojamunskolai.lv īpašnieki nenes atbildību par fotoattēlu krāsu parametru nodošanu Klienta displejā.</li>
                    </ul>

                    <h4 class="title">9. Personīgās informācijas konfidencialitāte un drošība</h4>
                    <ul class="list">
                        <li>9.1. Klienta sniegtās informācijas izmantošana.</li>
                        <li>9.1.1. Pārdevējs izmanto Klienta informāciju ar nolūku:
                            <ul class="list nobm">
                                <li>1.	Klienta reģistrācijai vietnē;</li>
                                <li>2.	Savu saistību izpilde attiecībā pret Klientu;</li>
                                <li>3.	Vietnes novērtēšanai un darba analīzei;</li>
                                <li>4.	Klienta informēšanai par kolekcijas papildinājumiem vai veiktajām akcijām.</li>
                            </ul>
                        </li>
                        <li>9.2.2. Pārdevējam ir tiesības nosūtīt Klientam reklāmas un informatīvo paziņojumu. Ja Klients nevēlas saņemt no Pārdevēja šāda satura paziņojumus, viņš var nosūtīt attiecīgu paziņojumu uz e-pastu <a href="mailto:info@alba-ltd.lv">info@alba-ltd.lv</a>.</li>
                        <li>9.3. Pārdevēja saņemtās informācijas izpaušana.</li>
                        <li>9.3.1. Pārdevējs apņemas neizpaust no Klienta saņemto informāciju. Par pārkāpumu netiek uzskatīta informācijas nodošana par Klientu aģentiem un trešajām personām, kuras darbojas saskaņā ar Pārdevēju noslēgto līgumu ar nolūku Klienta priekšā pieņemto saistību izpildei.</li>
                        <li>9.3.2. Netiek uzskatīta par noteikumu pārkāpumu, informācijas izpaušana robežās, kas atbilst Latvijas Republikas likumdošanai.</li>
                        <li>9.3.3. Pārdevējs saņem IP adreses informāciju par vietnes birojamunskolai.lv apmeklētājiem. Šī informācija netiek izmantota ar nolūku apmeklētāja personības noteikšanai.</li>
                        <li>9.4. Pārdevējs nenes atbildību par Klienta vietnē publiskajā formā sniegto informāciju.</li>
                    </ul>

                    <h4 class="title">10. Citi noteikumi</h4>
                    <ul class="list">
                        <li>10.1. Attiecības starp Klientu un Pārdevēju reglamentē Latvijas Republikas likumdošana.</li>
                        <li>10.2. Radušos jautājumu vai domstarpību gadījumā, Klients telefoniski vai izmantojot e-pastu <a href="mailto:info@alba-ltd.lv">info@alba-ltd.lv</a>. Visas radušās domstarpības puses pēc iespējas risina pārrunu ceļā. Ja vienošanās netiek panākta, strīds tiks nodots izskatīšanai tiesā saskaņā ar Latvijas Republikas likumdošanu.</li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Privacy Policy Area  -->


@endsection
