<?php
 //questo seeder è stato generato con l'aiuto di Claude Code di Anthropic
namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $writers  = User::where('role', 'writer')->get();
        $revisor  = User::where('role', 'revisor')->first();
        $categories = Category::all();

        $articles = [
            [
                'title'    => 'Il futuro dell\'intelligenza artificiale in Italia',
                'subtitle' => 'Come le aziende italiane stanno adottando l\'AI nei propri processi',
                'body'     => 'L\'intelligenza artificiale sta trasformando il panorama imprenditoriale italiano. Dalle PMI alle grandi corporation, sempre più realtà stanno integrando soluzioni basate su machine learning e automazione nei loro flussi di lavoro quotidiani. Secondo un recente report di Confindustria Digitale, il mercato dell\'AI in Italia ha registrato una crescita del 32% nell\'ultimo anno, raggiungendo un valore di 500 milioni di euro. Le applicazioni più diffuse riguardano la customer care automatizzata, l\'analisi predittiva delle vendite e l\'ottimizzazione della supply chain. Tuttavia, rimangono aperti importanti interrogativi etici e formativi: come garantire che la forza lavoro sia pronta per questa transizione? La risposta sembra risiedere in programmi di upskilling mirati e in una collaborazione più stretta tra università e imprese.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Serie A: Milan e Juventus si dividono la posta',
                'subtitle' => 'Il derby d\'Italia finisce 1-1 allo stadio Meazza',
                'body'     => 'Una partita intensa e combattuta quella andata in scena ieri sera a Milano. Il Milan e la Juventus hanno offerto agli spettatori del Meazza uno spettacolo di grande livello tecnico, terminato con un pareggio che lascia entrambe le squadre con un punto in più in classifica. La Juventus è passata in vantaggio al 23° minuto con una rete di testa su calcio d\'angolo. Il Milan ha risposto nella ripresa con un tiro dal limite che non ha lasciato scampo al portiere bianconero. Nella fase finale entrambe le squadre hanno avuto occasioni per chiuderla, ma la precisione è mancata nei momenti cruciali. Il pareggio tiene entrambe le formazioni nella lotta per le posizioni europee.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Mercati europei: spread in calo, borse in rialzo',
                'subtitle' => 'La BCE mantiene i tassi stabili, segnale positivo per i mercati',
                'body'     => 'La decisione della Banca Centrale Europea di mantenere invariati i tassi di interesse ha dato una spinta positiva ai mercati finanziari europei. Lo spread BTP-Bund è sceso sotto quota 120 punti base per la prima volta negli ultimi sei mesi, mentre Piazza Affari ha chiuso la seduta con un guadagno del 1,8%. Gli analisti interpretano questo come un segnale di stabilità macroeconomica. "La BCE ha dimostrato di saper bilanciare la lotta all\'inflazione con la necessità di sostenere la crescita", ha commentato un economista della principale banca di investimento milanese. Le previsioni per il prossimo trimestre restano caute ma tendenzialmente ottimistiche.',
                'category' => 'Economia',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'La riforma della giustizia torna in parlamento',
                'subtitle' => 'Nuovo round di discussioni sulla separazione delle carriere',
                'body'     => 'Il disegno di legge sulla riforma della giustizia è tornato al centro del dibattito parlamentare questa settimana. La proposta, che prevede tra l\'altro la separazione delle carriere tra giudici e pubblici ministeri, continua a dividere la maggioranza e l\'opposizione. I favorevoli sottolineano la necessità di garantire maggiore imparzialità nel sistema giudiziario. I contrari temono invece che la riforma indebolisca l\'indipendenza della magistratura. Le audizioni degli esperti in commissione si sono concluse ieri e l\'aula dovrebbe votare entro fine mese. L\'esito rimane incerto, con alcuni parlamentari della maggioranza che hanno espresso perplessità su alcuni articoli specifici.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Sanremo 2026: i favoriti e le sorprese dell\'ultima ora',
                'subtitle' => 'Analisi delle canzoni in gara e dei possibili vincitori',
                'body'     => 'Mancano poche settimane all\'inizio del Festival di Sanremo 2026 e già fervono le discussioni tra appassionati e critici musicali. Quest\'anno il cast presenta una interessante mescolanza di artisti affermati e nuove voci emergenti. Tra i favoriti spiccano alcuni nomi storici della musica italiana, affiancati da artisti della scena urban e indie che stanno conquistando le classifiche streaming. La novità di quest\'anno è l\'introduzione di una sezione dedicata alle collaborazioni internazionali, che potrebbe portare a performance inedite e sorprendenti. I bookmaker già piazzano le loro quote, ma la storia del festival insegna che spesso sono le sorprese a trionfare.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Alimentazione e longevità: i segreti della dieta mediterranea',
                'subtitle' => 'Nuovi studi confermano i benefici per la salute cardiovascolare',
                'body'     => 'Un\'ampia ricerca condotta su oltre 12.000 partecipanti in cinque paesi europei ha confermato ciò che i nutrizionisti sostengono da decenni: la dieta mediterranea riduce significativamente il rischio di malattie cardiovascolari. Lo studio, pubblicato su una delle principali riviste mediche internazionali, ha evidenziato che chi segue regolarmente questo regime alimentare presenta un rischio inferiore del 28% di sviluppare problemi cardiaci rispetto a chi segue diete occidentali ricche di grassi saturi. Gli alimenti chiave sono l\'olio d\'oliva extravergine, i legumi, il pesce azzurro e la frutta secca. I ricercatori sottolineano anche l\'importanza dell\'aspetto sociale dei pasti, spesso trascurato nelle analisi puramente nutrizionali.',
                'category' => 'Economia',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Open source e startup: l\'ecosistema italiano cresce',
                'subtitle' => 'Milano e Roma guidano la classifica degli hub tecnologici europei',
                'body'     => 'Il rapporto annuale sullo stato delle startup italiane rivela una crescita sostenuta dell\'ecosistema tech nazionale. Con oltre 14.000 startup attive e investimenti che hanno superato i 2 miliardi di euro nell\'ultimo anno, l\'Italia si posiziona tra i primi cinque paesi europei per dinamismo del settore. Milano rimane il principale hub, ma Roma sta recuperando terreno grazie a una serie di iniziative pubbliche e private che stanno creando un ambiente favorevole all\'innovazione. Particolarmente vivace il settore fintech e quello delle soluzioni green. La sfida principale rimane attrarre e trattenere talenti, in un mercato sempre più competitivo a livello europeo.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Nuovi trend nel food: fermentati e cucina di recupero',
                'subtitle' => 'I ristoratori italiani adottano pratiche sempre più sostenibili',
                'body'     => 'La cucina italiana sta vivendo una doppia rivoluzione: da un lato la riscoperta degli alimenti fermentati tradizionali come il pane a lievitazione naturale, i formaggi artigianali e le verdure in salamoia; dall\'altro una crescente attenzione alla cucina di recupero, che valorizza scarti e avanzi trasformandoli in piatti creativi e gustosi. Chef di tutto il paese stanno abbracciando questa filosofia non solo per ragioni etiche, ma anche economiche e di differenziazione. Il risultato è una cucina più ricca, complessa e rispettosa delle risorse naturali. Diversi ristoranti si sono già aggiudicati riconoscimenti internazionali proprio per queste pratiche innovative.',
                'category' => 'Food&Drink',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Autonomia differenziata: le regioni del Sud si mobilitano',
                'subtitle' => 'Governi regionali e sindaci protestano contro la proposta di legge',
                'body'     => 'La proposta di legge sull\'autonomia differenziata continua a far discutere. Nelle ultime settimane le regioni del Sud Italia hanno intensificato le loro proteste, organizzando convegni, manifestazioni e inviando formali osservazioni al governo centrale. La preoccupazione principale riguarda la possibile accentuazione dei divari economici e sociali tra Nord e Sud del paese. I presidenti di regione di Campania, Calabria, Sicilia e Puglia hanno firmato un documento congiunto in cui chiedono modifiche sostanziali al testo. Il governo ha aperto a un dialogo, pur ribadendo la volontà di procedere con la riforma. Il dibattito coinvolge anche accademici ed esperti di diritto costituzionale.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Calcio femminile: l\'Italia vola alle Olimpiadi',
                'subtitle' => 'Le azzurre battono la Svezia e staccano il biglietto per Parigi',
                'body'     => 'Una prestazione storica quella della nazionale femminile italiana di calcio, che ha conquistato la qualificazione alle Olimpiadi di Parigi con una vittoria convincente sulla Svezia. Le azzurre hanno dominato il match fin dai primi minuti, segnando due gol nel primo tempo e controllando il gioco nella ripresa. La prestazione ha confermato i progressi del calcio femminile italiano degli ultimi anni, frutto di investimenti crescenti da parte delle società e di una maggiore attenzione mediatica. "È un momento storico per il nostro movimento", ha dichiarato la capitana al termine della partita tra le lacrime di gioia. La qualificazione alle Olimpiadi è vista come un trampolino per il futuro del calcio femminile in Italia.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Quantum computing: l\'Italia entra nel club dei pionieri',
                'subtitle' => 'Inaugurato a Bologna il primo centro di ricerca quantistica nazionale',
                'body'     => 'L\'Italia ha compiuto un passo importante nel campo del quantum computing con l\'inaugurazione del Centro Nazionale per il Calcolo Quantistico di Bologna. La struttura, frutto di un investimento pubblico-privato di 120 milioni di euro, ospiterà alcuni dei più avanzati computer quantistici d\'Europa. Il centro collaborerà con le principali università italiane e con centri di ricerca internazionali per sviluppare applicazioni in settori che vanno dalla crittografia alla simulazione molecolare, dalla logistica all\'intelligenza artificiale. "Questo è il momento in cui l\'Italia decide di non essere uno spettatore ma un protagonista della prossima rivoluzione tecnologica", ha dichiarato il ministro dell\'università all\'inaugurazione.',
                'category' => 'Tech',
                'with_image' => false,
                'is_accepted' => false,
            ],
            [
                'title'    => 'Vino italiano: export record nel primo trimestre',
                'subtitle' => 'Germania e USA i mercati più dinamici per i nostri produttori',
                'body'     => 'Il settore vitivinicolo italiano archivia un primo trimestre da record con un incremento delle esportazioni del 18% rispetto allo stesso periodo dell\'anno precedente. I dati, elaborati dall\'Osservatorio del vino italiano, mostrano una domanda crescente soprattutto in Germania, Stati Uniti e Giappone. I vini più richiesti all\'estero sono il Prosecco, il Barolo e il Brunello di Montalcino, ma cresce anche l\'interesse per etichette meno conosciute di regioni come la Campania e la Sicilia. I produttori guardano con ottimismo al resto dell\'anno, pur segnalando alcune difficoltà legate ai costi energetici e alla siccità che ha interessato alcune zone viticole nella scorsa stagione.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => true,
            ],
            // --- Economia ---
            [
                'title'    => 'Inflazione in calo: il potere d\'acquisto degli italiani torna a crescere',
                'subtitle' => 'L\'ISTAT certifica il calo dei prezzi al consumo per il terzo mese consecutivo',
                'body'     => 'Dopo mesi di pressione sui bilanci familiari, l\'inflazione italiana ha finalmente imboccato una traiettoria discendente. Il dato ISTAT del mese scorso si è attestato all\'1,4%, il livello più basso degli ultimi tre anni, trascinato dal calo dei prezzi energetici e alimentari. Le famiglie a reddito medio stanno recuperando capacità di spesa, come confermato dall\'indice dei consumi interni che ha segnato un +2,1% su base annua. Economisti e associazioni di categoria accolgono il dato positivamente, pur invitando alla cautela: la volatilità dei mercati energetici globali potrebbe ribaltare il trend in pochi mesi. Il governo punta ora a consolidare la stabilità dei prezzi con misure strutturali sulla concorrenza nella distribuzione.',
                'category' => 'Economia',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Startup fintech italiane: 800 milioni raccolti in sei mesi',
                'subtitle' => 'Il settore dei pagamenti digitali guida la crescita degli investimenti',
                'body'     => 'Le startup fintech italiane hanno registrato un semestre da record, raccogliendo complessivamente 800 milioni di euro in round di finanziamento, un incremento del 45% rispetto allo stesso periodo del 2025. Il settore dei pagamenti digitali continua a trainare il mercato, seguito da soluzioni di lending alternativo e robo-advisory. Tra le realtà più attive spiccano alcune scale-up con sede a Milano che stanno espandendo le proprie operazioni in Francia, Spagna e Germania. Il quadro regolatorio europeo aggiornato dalla direttiva PSD3 ha contribuito ad aumentare la fiducia degli investitori istituzionali. L\'ecosistema italiano, tuttavia, soffre ancora della scarsità di fondi di venture capital locali di grande dimensione.',
                'category' => 'Economia',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'PIL italiano: +0,9% nel primo trimestre 2026',
                'subtitle' => 'La crescita supera le attese, trainata da export e consumi interni',
                'body'     => 'L\'economia italiana ha sorpreso positivamente con una crescita del PIL dello 0,9% nel primo trimestre 2026, superando le previsioni degli analisti che si aspettavano un +0,6%. A trainare l\'espansione sono stati soprattutto le esportazioni di macchinari e beni di lusso, insieme a una ripresa dei consumi interni nelle categorie di servizi e ristorazione. Il settore manifatturiero del Nord-Est ha guidato la performance industriale, mentre il turismo continua a essere un motore fondamentale per le regioni del Centro-Sud. Il Ministero dell\'Economia ha rivisto al rialzo le stime per l\'intero anno portandole all\'1,4%. Rimangono tuttavia tensioni sul mercato del lavoro giovanile, con un tasso di disoccupazione under-30 ancora sopra il 20%.',
                'category' => 'Economia',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Riforma delle pensioni: le principali novità del progetto di legge',
                'subtitle' => 'Flessibilità in uscita e penalizzazioni ridotte al centro del dibattito',
                'body'     => 'Il governo ha presentato in commissione un articolato progetto di riforma del sistema pensionistico italiano che dovrebbe entrare in vigore a partire dal 2027. Le misure principali prevedono l\'introduzione di una quota flessibile che consente l\'uscita anticipata con una riduzione dell\'assegno progressiva in base agli anni di anticipo, l\'aumento del contributo per i lavoratori autonomi e una revisione dei coefficienti di trasformazione per i giovani. I sindacati hanno già annunciato la loro contrarietà su diversi punti, in particolare sulla penalizzazione per chi va in pensione prima dei 63 anni. Le trattative con le parti sociali sono in corso e il testo definitivo potrebbe subire significative modifiche prima dell\'approvazione finale in parlamento.',
                'category' => 'Economia',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Turismo culturale: presenze straniere nelle città d\'arte a +22%',
                'subtitle' => 'Roma, Firenze e Venezia guidano il boom, ma crescono anche le mete minori',
                'body'     => 'L\'Italia conferma il suo ruolo di prima destinazione turistica mondiale per il patrimonio culturale: le presenze straniere nelle principali città d\'arte hanno registrato un incremento del 22% nel primo semestre 2026, con Roma che ha superato per la prima volta i 20 milioni di visitatori in sei mesi. Firenze e Venezia restano mete imprescindibili, ma cresce in modo significativo l\'interesse per destinazioni meno conosciute come Matera, Lecce, Alberobello e le città d\'arte siciliane. Il turismo di prossimità europeo domina i flussi, con tedeschi, francesi e spagnoli in testa, seguiti da americani e giapponesi. Le principali criticità restano la gestione dei flussi nei centri storici più congestionati e il fenomeno dell\'overtourism che continua a pesare sulla qualità della vita dei residenti.',
                'category' => 'Economia',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Bollette energetiche: i nuovi incentivi per famiglie e imprese',
                'subtitle' => 'Il decreto energia stanzia 3 miliardi per sostenere la transizione e ridurre i costi',
                'body'     => 'Il Consiglio dei Ministri ha approvato un pacchetto di incentivi energetici da 3 miliardi di euro destinato a famiglie vulnerabili, PMI e grandi imprese energivore. Le famiglie con ISEE sotto i 15.000 euro beneficeranno di uno sconto diretto in bolletta del 30%, mentre le piccole e medie imprese potranno accedere a crediti d\'imposta per investimenti in efficienza energetica e fotovoltaico. Per le grandi industrie il decreto prevede contratti di fornitura a lungo termine con prezzi calmierati, in cambio di impegni sulla riduzione delle emissioni di CO2. Le associazioni degli industriali hanno accolto con favore il provvedimento, evidenziando però che sarà fondamentale la rapidità nei tempi di erogazione effettiva degli incentivi per evitare che le risorse rimangano bloccate in iter burocratici.',
                'category' => 'Economia',
                'with_image' => false,
                'is_accepted' => null,
            ],
            // --- Food&Drink ---
            [
                'title'    => 'La pizza napoletana compie cinque anni da patrimonio UNESCO',
                'subtitle' => 'Celebrazioni in tutto il mondo, ma i maestri pizzaioli chiedono più tutele',
                'body'     => 'Cinque anni fa la pizza napoletana è entrata a far parte del Patrimonio Culturale Immateriale dell\'Umanità dell\'UNESCO, un riconoscimento che ha trasformato il modo in cui il mondo guarda a questo piatto iconico. Le celebrazioni si sono svolte in decine di città internazionali, dal Tokyo Pizza Festival alla New York Pizza Week, con eventi che hanno raccolto centinaia di migliaia di appassionati. A Napoli, l\'Associazione Verace Pizza Napoletana ha organizzato una maratona di 48 ore con i migliori maestri pizzaioli del mondo. Tuttavia, il riconoscimento ha anche amplificato il fenomeno delle imitazioni di scarsa qualità che sfruttano il brand "napoletana" senza rispettare i disciplinari. I pizzaioli campani chiedono una normativa più stringente a livello europeo per proteggere la denominazione.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Vini naturali: dalla nicchia alle carte dei grandi ristoranti',
                'subtitle' => 'La rivoluzione dei produttori artigianali conquista sommelier e appassionati',
                'body'     => 'Quello che fino a pochi anni fa era considerato un fenomeno di nicchia per appassionati radicali sta diventando una corrente sempre più mainstream nel mondo enologico italiano. I vini naturali, prodotti con uve biologiche o biodinamiche, senza solfiti aggiunti e con lavorazioni minime in cantina, compaiono ormai nelle carte di ristoranti stellati da Milano a Palermo. La Guida Gambero Rosso ha dedicato per la prima volta una sezione speciale ai produttori naturali, riconoscendo la qualità crescente di questa categoria. I produttori, per lo più piccole aziende a conduzione familiare, lamentano però la difficoltà di scalare la produzione senza compromettere i principi artigianali che li distinguono. Il dibattito su cosa significhi esattamente "vino naturale" rimane aperto e privo di una definizione legale condivisa in Italia.',
                'category' => 'Food&Drink',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Street food di qualità: i mercati artigianali che cambiano il modo di mangiare in città',
                'subtitle' => 'Da Milano a Palermo, cresce la cultura del cibo di strada gourmet',
                'body'     => 'I mercati di street food di qualità stanno trasformando il modo in cui gli italiani vivono gli spazi urbani e consumano il cibo fuori casa. Nati come eventi occasionali, molti di questi mercati si sono trasformati in appuntamenti fissi che attraggono migliaia di visitatori ogni fine settimana. La proposta gastronomica è sempre più ricercata: dai supplì romani agli arancini siciliani, passando per panini con salumi artigianali, formaggi di montagna e specialità regionali dimenticate. I produttori partecipanti sono spesso agricoltori e artigiani che trovano in questi eventi un canale di vendita diretto alternativo alla grande distribuzione. Il fenomeno sta contribuendo anche alla valorizzazione di quartieri periferici e alla rigenerazione di spazi urbani dismessi.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Caffè specialty: i baristi d\'autore che stanno rivoluzionando la tazzina italiana',
                'subtitle' => 'Terza ondata del caffè: quando l\'espresso diventa esperienziale',
                'body'     => 'La "terza ondata" del caffè — quella che tratta il chicco come un prodotto di alta gastronomia, con origine tracciata, metodi di estrazione sperimentali e una narrazione dettagliata del percorso dalla piantagione alla tazza — ha finalmente conquistato anche l\'Italia, patria del rito dell\'espresso. Nei centri delle principali città italiane proliferano i caffè specialty, dove baristi formati come veri professionisti propongono filtri a caldo e a freddo, metodi d\'infusione giapponesi e spagnoli, e soprattutto espresso estratto con cura maniacale da miscele o monorigine selezionate. Il prezzo della singola tazzina, che supera spesso i 3 euro, fa storcere il naso ai puristi del caffè da bar tradizionale, ma la clientela giovane e internazionale risponde con entusiasmo. Le grandi torrefazioni italiane osservano il fenomeno con interesse e alcune stanno acquisendo microroastery specialty per diversificare l\'offerta.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Olio extravergine 2025: annata eccezionale nonostante il clima',
                'subtitle' => 'La produzione supera le aspettative, qualità ai massimi storici in Puglia e Sicilia',
                'body'     => 'Nonostante una primavera siccitosa che aveva fatto temere il peggio, la campagna olearia 2025 si è conclusa con risultati superiori alle attese, in particolare nelle regioni del Sud. La Puglia, che da sola produce oltre il 40% dell\'olio extravergine italiano, ha registrato un incremento produttivo del 15% rispetto all\'anno precedente, con un livello qualitativo giudicato eccellente dai principali panel di assaggio. In Sicilia e Calabria il quadro è simile, con cultivar autoctone come la Nocellara del Belice e la Carolea apprezzatissime sul mercato internazionale. Il prezzo al frantoio si è mantenuto su livelli elevati, riflettendo la qualità superiore e la maggiore consapevolezza dei consumatori. Le esportazioni verso USA, Germania e Giappone sono già cresciute del 12% rispetto allo stesso periodo dell\'anno scorso.',
                'category' => 'Food&Drink',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Il risotto alla milanese conquista i ristoranti del mondo',
                'subtitle' => 'Dal piatto della tradizione lombarda a simbolo della cucina italiana nel mondo',
                'body'     => 'Il risotto alla milanese, con il suo caratteristico colore giallo donato dallo zafferano e la consistenza cremosa ottenuta dalla mantecatura con burro e parmigiano, è diventato uno degli ambasciatori più efficaci della cucina italiana nel mondo. I dati delle prenotazioni nei principali ristoranti italiani all\'estero mostrano che il risotto figura tra i cinque piatti più ordinati dai clienti internazionali, superando anche la pasta in alcuni mercati asiatici. A Milano, dove il piatto è nato, i migliori ristoranti propongono versioni che vanno dall\'interpretazione classica rigorosa alle rivisitazioni creative con tartufo, midollo o varianti vegetariane con brodo di verdure dorate. Diversi chef milanesi stanno portando la loro versione del risotto in tournée gastronomiche internazionali, contribuendo a diffondere la cultura culinaria lombarda.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => null,
            ],
            // --- Intrattenimento ---
            [
                'title'    => 'Cannes 2026: il cinema italiano trionfa con due Palme d\'Oro',
                'subtitle' => 'Una generazione di registi under-40 porta l\'Italia sul tetto del mondo',
                'body'     => 'Il Festival di Cannes 2026 rimarrà nella storia del cinema italiano come l\'edizione della consacrazione internazionale. Due pellicole italiane hanno conquistato rispettivamente la Palma d\'Oro per il miglior film e quella per la migliore regia, un risultato senza precedenti nella storia del festival. I registi premiati appartengono a una generazione di under-40 formatisi tra i set italiani e le scuole di cinema europee, che porta sullo schermo storie di periferia urbana, emigrazione e identità con uno stile visivo potente e originale. Il presidente della giuria ha elogiato la capacità del cinema italiano di raccontare il presente con una sensibilità estetica unica. I film premiati usciranno nelle sale italiane e internazionali nei prossimi mesi, con aspettative altissime al botteghino.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Serie TV made in Italy: Netflix e Prime puntano forte sulla produzione italiana',
                'subtitle' => 'Tre nuove produzioni originali italiane tra le più viste in Europa',
                'body'     => 'Le piattaforme di streaming internazionali hanno definitivamente scoperto il potenziale delle produzioni italiane, con Netflix e Amazon Prime Video che hanno annunciato un totale di dodici nuove serie originali in produzione in Italia nel solo 2026. Tre di queste si sono già classificate tra i dieci contenuti più visti in Europa nel primo trimestre: un thriller ambientato nella Napoli sotterranea, una saga familiare sarda e un dramma storico sul Rinascimento fiorentino. L\'industria televisiva italiana beneficia di queste commesse internazionali sia economicamente che in termini di visibilità globale, pur sollevando interrogativi sulla preservazione delle specificità culturali quando si produce per un pubblico globale. I sindacati degli attori e dei tecnici chiedono garanzie sulle condizioni lavorative nei contratti con le major internazionali.',
                'category' => 'Intrattenimento',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Estate 2026: il calendario dei concerti e festival musicali',
                'subtitle' => 'Da Vasco Rossi al Primavera Sound, l\'Italia si prepara a un\'estate di musica',
                'body'     => 'L\'estate 2026 si preannuncia come una delle più ricche di eventi musicali nella storia recente italiana. Il tour di Vasco Rossi, che tornerà sul palco dopo due anni di pausa, ha già registrato il tutto esaurito in sette stadi, con oltre 500.000 biglietti venduti in poche ore dall\'apertura. Il Primavera Sound sbarca per la prima volta a Roma con una lineup che mescola artisti internazionali di primo piano a realtà dell\'indie italiano emergente. Non mancano i festival di genere: jazz, elettronica, classica e opera sono ben rappresentati da Umbria Jazz al Ravenna Festival, passando per il Sónar Milano. Le amministrazioni comunali stanno investendo in spazi all\'aperto e ampliando le capienza degli anfiteatri storici per far fronte alla domanda crescente di cultura live.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Il fumetto italiano vive la sua età dell\'oro',
                'subtitle' => 'Vendite in crescita del 34%, nuovi autori conquistano i mercati internazionali',
                'body'     => 'L\'industria del fumetto italiano attraversa un periodo di straordinaria vitalità creativa e commerciale. Le vendite di graphic novel e albi a fumetti hanno registrato una crescita del 34% negli ultimi due anni, spinte da una nuova generazione di autori che propone storie lontane dai generi tradizionali del bonelliano e avvicina al medium nuovi lettori adulti. Fiere come Lucca Comics & Games continuano a battere record di presenze, con 300.000 visitatori nell\'ultima edizione. Sul fronte internazionale, diversi autori italiani hanno firmato contratti con le grandi case editrici statunitensi e francesi, portando all\'estero uno sguardo specificamente italiano su temi come la storia, il paesaggio e l\'identità mediterranea. Il problema principale rimane la difficoltà per i nuovi autori di accedere ai canali distributivi tradizionali dominati da pochi grandi editori.',
                'category' => 'Intrattenimento',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Gaming italiano: i giovani sviluppatori all\'assalto dei mercati globali',
                'subtitle' => 'Dal Paese del Rinascimento al videogioco: la nuova frontiera creativa',
                'body'     => 'L\'industria italiana del videogioco sta vivendo una stagione di crescita sorprendente. Piccoli studi indipendenti nati negli ultimi cinque anni hanno già collezionato premi internazionali e collaborazioni con publisher di primo piano. Il titolo più chiacchierato dell\'anno è un gioco di esplorazione ambientato nell\'Italia medievale, sviluppato da un team di quindici persone a Torino, che ha venduto oltre 800.000 copie nel primo mese. Il governo ha introdotto tax credit specifici per le produzioni videoludiche italiane, sulla falsa riga del modello francese, che stanno attirando capitali esteri sul settore. Le scuole di game design proliferano nelle principali città, ma la sfida rimane trattenere i talenti in Italia invece di vederli emigrare verso gli hub internazionali del settore come Londra, Montreal e Los Angeles.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Teatro italiano: presenze ai massimi storici nella stagione 2025/26',
                'subtitle' => 'Il pubblico giovane torna in sala, la prosa contemporanea traina la crescita',
                'body'     => 'La stagione teatrale 2025/26 ha registrato un dato straordinario: le presenze nei teatri italiani hanno superato per la prima volta i 15 milioni, con una quota di under-35 in sala cresciuta del 28% rispetto alla stagione precedente. Il merito è di una programmazione che mescola repertorio classico a drammaturgia contemporanea, con compagnie di nuova generazione che affrontano temi di stretta attualità con linguaggi scenici innovativi. I teatri stabili delle grandi città hanno potenziato l\'offerta di spettacoli in abbonamento ridotto per i giovani, con risultati positivi sulla fidelizzazione. La prosa contemporanea italiana, in particolare, sta conquistando spazio nei principali festival europei come Avignone e il Festival Internazionale di Edimburgo. Le compagnie indipendenti, tuttavia, continuano a lamentare l\'insufficienza dei contributi pubblici al settore.',
                'category' => 'Intrattenimento',
                'with_image' => false,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Grandi mostre 2026: l\'Italia torna capitale mondiale dell\'arte',
                'subtitle' => 'Da Leonardo a Caravaggio, il calendario espositivo è da tutto esaurito',
                'body'     => 'Il 2026 si conferma come un anno d\'oro per le mostre d\'arte italiane. L\'esposizione dedicata a Leonardo da Vinci alle Scuderie del Quirinale ha già venduto 280.000 biglietti a tre settimane dall\'apertura, con prenotazioni esaurite per i primi due mesi. A Milano, il Palazzo Reale accoglie una retrospettiva su Caravaggio e la sua scuola che ha richiesto cinque anni di preparazione e prestiti eccezionali da musei internazionali. Venezia si prepara per la Biennale con un padiglione italiano curato da una giovane storica dell\'arte che ha già suscitato polemiche e curiosità. Il problema annoso dei musei italiani — personale insufficiente, orari ridotti, mancanza di fondi per la manutenzione — rimane irrisolto, rischiando di compromettere l\'esperienza dei visitatori nelle strutture minori.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            // --- Politica ---
            [
                'title'    => 'Legge di bilancio 2027: le principali misure approvate',
                'subtitle' => 'Tagli al cuneo fiscale, più fondi per sanità e istruzione',
                'body'     => 'Il Consiglio dei Ministri ha approvato la manovra di bilancio per il 2027 da 28 miliardi di euro, che dovrà ora affrontare l\'iter parlamentare. Le misure principali includono un ulteriore taglio del cuneo fiscale per i redditi fino a 35.000 euro annui, un incremento del fondo sanitario nazionale di 3 miliardi e un piano pluriennale di investimenti per l\'istruzione pubblica con focus sull\'università e la ricerca. Sul versante delle entrate, il governo punta su una stretta all\'evasione fiscale attraverso l\'incrocio di banche dati e l\'estensione della fatturazione elettronica a nuove categorie. L\'opposizione ha già presentato oltre mille emendamenti, annunciando una battaglia serrata in commissione bilancio. I sindacati esprimono apprezzamento per il taglio al cuneo ma chiedono misure più incisive sul salario minimo.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Elezioni comunali: centrosinistra avanza nelle grandi città',
                'subtitle' => 'Risultati definitivi in dieci capoluoghi di provincia',
                'body'     => 'Il centrosinistra ha ottenuto un risultato positivo nelle elezioni comunali che si sono svolte in dieci capoluoghi di provincia italiani, vincendo il ballottaggio in sei dei nove comuni in cui era arrivato. Il dato più significativo è la conquista di due capoluoghi di regione tradizionalmente governati dal centrodestra, dove i candidati di coalizione hanno prevalso con margini superiori al 5%. La partecipazione al voto si è attestata al 58%, in leggero calo rispetto alle precedenti consultazioni ma superiore alle previsioni più pessimistiche. I leader nazionali del centrosinistra leggono il risultato come una conferma del cambio di clima politico emerso anche negli ultimi sondaggi nazionali. Il centrodestra, pur ammettendo il risultato negativo, evidenzia la vittoria in quattro comuni tra cui un capoluogo di medie dimensioni al Nord.',
                'category' => 'Politica',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Migrazioni: l\'Italia presenta la sua proposta alla presidenza europea',
                'subtitle' => 'Piano in dieci punti per la gestione condivisa dei flussi nel Mediterraneo',
                'body'     => 'Durante il Consiglio europeo straordinario dedicato al tema migrazioni, l\'Italia ha presentato un piano articolato in dieci punti per una gestione europea condivisa dei flussi migratori nel Mediterraneo. La proposta prevede la creazione di hub di accoglienza e identificazione in territorio nordafricano finanziati dall\'UE, un meccanismo automatico di redistribuzione dei richiedenti asilo tra i paesi membri e un potenziamento delle missioni di pattugliamento congiunto. La proposta ha raccolto il sostegno formale di cinque paesi del Mediterraneo e l\'opposizione dei paesi del Nord Europa che rifiutano il meccanismo di redistribuzione obbligatoria. Le ONG che operano nel Mediterraneo hanno espresso forte preoccupazione per le clausole relative agli hub extraterritoriali, giudicati incompatibili con le norme internazionali di protezione dei rifugiati.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Opposizione compatta contro la riforma fiscale',
                'subtitle' => 'La rimodulazione delle aliquote IRPEF divide il paese',
                'body'     => 'Per la prima volta dalla caduta del precedente governo, i partiti di opposizione hanno presentato un fronte unitario contro la riforma fiscale proposta dalla maggioranza. Il progetto di legge prevede una rimodulazione delle aliquote IRPEF che riduce la pressione fiscale sui redditi medio-alti finanziandola attraverso un ampliamento della platea dei soggetti tenuti a versare le addizionali locali. I critici sostengono che l\'intervento favorisca chi guadagna tra i 50.000 e gli 80.000 euro annui a scapito delle fasce più deboli. Il governo risponde che l\'effetto complessivo è progressivo e che la riforma viene accompagnata da misure di welfare compensative. Il testo è atteso in aula entro tre settimane e la discussione promette di essere accesa, con diversi senatori della maggioranza che hanno già manifestato perplessità su alcuni passaggi tecnici.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Transizione energetica: il parlamento approva la legge quadro',
                'subtitle' => 'Obiettivo net-zero al 2050, con tappe intermedie vincolanti al 2030 e 2040',
                'body'     => 'Il parlamento ha approvato con larga maggioranza la legge quadro sulla transizione energetica, che fissa l\'obiettivo di neutralità carbonica al 2050 con tappe intermedie vincolanti: riduzione del 55% delle emissioni al 2030 e del 80% al 2040 rispetto ai livelli del 1990. La legge prevede incentivi decrescenti per le rinnovabili, la progressiva eliminazione dei sussidi alle fonti fossili entro il 2030 e un piano nazionale per la riqualificazione dei lavoratori dei settori impattati dalla decarbonizzazione. Le associazioni industriali hanno espresso un giudizio complessivamente positivo, sottolineando però la necessità di certezza regolatoria per gli investimenti di lungo periodo. Le organizzazioni ambientaliste ritengono gli obiettivi insufficienti rispetto all\'urgenza della crisi climatica e chiedono un anticipo del target net-zero al 2045.',
                'category' => 'Politica',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Accordo Italia-Francia sulle infrastrutture alpine',
                'subtitle' => 'Firmato il trattato per il completamento del Tav e del tunnel del Moncenisio',
                'body'     => 'I governi italiano e francese hanno firmato un accordo bilaterale che sblocca il completamento delle grandi infrastrutture alpine condivise, a partire dalla Torino-Lione e dal raddoppio del tunnel ferroviario del Moncenisio. L\'intesa, frutto di due anni di negoziati tecnici e politici, prevede una ripartizione paritaria dei costi per le opere ancora da realizzare e un cronoprogramma vincolante con penali per i ritardi. L\'accordo include anche nuove norme sulla gestione del traffico pesante attraverso il valico del Fréjus, con l\'obiettivo di trasferire una quota crescente di merci dalla gomma alla rotaia entro il 2030. I presidenti delle regioni Piemonte e Rhône-Alpes hanno acclamato l\'intesa come storica, mentre i comitati No-Tav annunciano nuove mobilitazioni contro quella che definiscono "un\'opera inutile e costosa".',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => false,
            ],
            // --- Sport ---
            [
                'title'    => 'Jannik Sinner conquista il secondo Australian Open consecutivo',
                'subtitle' => 'Il fenomeno altoatesino batte Djokovic in quattro set nella finale di Melbourne',
                'body'     => 'Jannik Sinner ha scritto un\'altra pagina di storia del tennis italiano conquistando il suo secondo Australian Open consecutivo con una vittoria magistrale su Novak Djokovic in quattro set. Il match, durato tre ore e quarantadue minuti, ha offerto al pubblico di Melbourne uno spettacolo tecnico di altissimo livello, con Sinner che ha dimostrato progressi evidenti nelle sue ultime due stagioni sia nell\'efficacia al servizio che nella capacità di gestire i punti cruciali. La vittoria consolida il tennista altoatesino al primo posto nel ranking mondiale, posizione che detiene ormai da dodici mesi consecutivi. L\'Italia intera si è fermata per seguire la finale in diretta, con ascolti televisivi che hanno superato i sette milioni di spettatori nella notte. Per Djokovic, 38 anni, si tratta della terza sconfitta consecutiva in una finale Slam, alimentando interrogativi sul futuro della sua carriera.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Ciclismo: Pogačar vince il Giro d\'Italia, Tiberi secondo',
                'subtitle' => 'L\'italiano chiude con un distacco minimo il grande rivale sloveno',
                'body'     => 'Tadej Pogačar ha conquistato il Giro d\'Italia 2026 con una prestazione dominante, vincendo quattro tappe e portando la maglia rosa dall\'ottava tappa fino all\'arrivo a Roma. A sorprendere, però, è stato Antonio Tiberi, il talento romano della Trek-Segafredo, che ha chiuso al secondo posto staccando nella classifica finale tutti i big del peloton eccetto lo sloveno. Per il 24enne romano si tratta del miglior risultato della carriera in un Grande Giro, e la sua prova ha acceso l\'entusiasmo degli appassionati italiani di ciclismo, a corto di eredi naturali ai successi di Nibali e Pantani. La tappa finale a Roma, in un circuito che passava davanti al Colosseo, ha attirato centinaia di migliaia di spettatori lungo le strade della capitale in una giornata di festa per tutto il ciclismo italiano.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Basket: l\'Olimpia Milano torna in finale di EuroLega dopo vent\'anni',
                'subtitle' => 'I meneghini battono il Real Madrid in semifinale con un finale da cardiopalma',
                'body'     => 'L\'Olimpia Milano ha conquistato la finale di EuroLega per la prima volta dopo vent\'anni, battendo il Real Madrid 87-85 in gara-5 delle semifinali con un canestro sulla sirena di Shavon Shields. La vittoria ha scatenato una festa in tutta Milano, con i tifosi che si sono riversati in piazza esattamente come succede per i trionfi dell\'Inter e del Milan. La squadra allenata da coach Messina ha dimostrato una crescita costante nel corso dell\'intera stagione, mescolando talento straniero di primissimo livello a giocatori italiani cresciuti nel settore giovanile del club. La finale si disputerà a Istanbul contro il Panathinaikos greco, con la gara d\'andata già fissata per il prossimo sabato. Non si giocava una finale di Coppa Campioni di basket europeo con una squadra italiana dall\'era di Snaidero Udine.',
                'category' => 'Sport',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Rugby: l\'Italia supera l\'Irlanda e sogna il Grande Slam',
                'subtitle' => 'Terza vittoria consecutiva nel Sei Nazioni per gli azzurri di Quesada',
                'body'     => 'Il rugby italiano ha compiuto un salto di qualità straordinario negli ultimi tre anni e la vittoria sull\'Irlanda campione in carica nel Sei Nazioni 2026 ne è la conferma più lampante. Gli azzurri di Gonzalo Quesada hanno superato 27-24 la squadra che era considerata la migliore del mondo grazie a una prova di carattere eccezionale, segnando tre mete e controllando il finale nonostante la forte pressione irlandese. Con tre vittorie nelle prime tre giornate, l\'Italia si trova in testa alla classifica e accarezza il sogno del Grande Slam, ovvero la vittoria contro tutte e cinque le avversarie. Un traguardo che la Nazionale azzurra non ha mai raggiunto nella storia del Sei Nazioni. I prossimi impegni contro Galles e Inghilterra diranno se questo gruppo è davvero pronto per scrivere la storia.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Nuoto: Simona Quadarella polverizza il record del mondo nei 1500 sl',
                'subtitle' => 'La romana abbassa di tre secondi il primato mondiale in vasca lunga a Budapest',
                'body'     => 'Simona Quadarella ha firmato uno dei risultati più straordinari della storia del nuoto italiano abbassando il record del mondo nei 1500 metri stile libero di tre secondi durante la tappa di Budapest della World Aquatics Cup. La nuotatrice romana, già campionessa del mondo e d\'Europa nella specialità, ha nuotato in 15\'43\"22, un tempo che gli esperti giudicano quasi inarrivabile per i prossimi anni. La performance è arrivata in perfette condizioni di vasca e con una tattica di gara pianificata alla perfezione dal suo allenatore Christian Minotti: partenza conservativa, prograssione costante e finale esplosivo nelle ultime cinque vasche. La Federazione Italiana Nuoto ha già comunicato che Quadarella sarà la portabandiera dell\'Italia ai prossimi Mondiali in programma a Singapore.',
                'category' => 'Sport',
                'with_image' => false,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Atletica: tre medaglie agli Europei di Helsinki',
                'subtitle' => 'Jacobs d\'argento nei 100, Tamberi oro nel salto in alto, staffetta di bronzo',
                'body'     => 'Gli Europei di atletica di Helsinki hanno regalato all\'Italia tre medaglie di grande prestigio in una sola giornata storica. Marcell Jacobs ha conquistato l\'argento nei 100 metri con il crono di 9\'86, superato solo dal britannico Hughes che ha firmato il record europeo. Gianmarco Tamberi ha difeso il suo titolo continentale nel salto in alto con una gara magistrale, prevalendo al misura di 2,36 metri con un solo errore in tutta la gara. La staffetta 4x100 maschile ha infine conquistato il bronzo in finale, correndo in 37\'84, il miglior tempo italiano di sempre nella staffetta. L\'Italia si conferma tra le prime tre nazioni europee nell\'atletica leggera, un traguardo impensabile appena dieci anni fa quando il movimento viveva una crisi profonda.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            // --- Tech ---
            [
                'title'    => '5G avanzato: le telco italiane completano la copertura nelle grandi città',
                'subtitle' => 'Roma e Milano tra le prime dieci città europee per qualità della rete mobile',
                'body'     => 'TIM, Vodafone e WindTre hanno annunciato congiuntamente il completamento della copertura 5G standalone nelle venti principali città italiane, portando Roma e Milano nelle prime dieci classifiche europee per qualità della rete mobile secondo l\'ultimo rapporto Opensignal. Le velocità di download nelle aree metropolitane coperte raggiungono mediamente i 680 Mbps in uplink e 120 Mbps in downlink, con latenze inferiori ai 10 millisecondi fondamentali per le applicazioni più esigenti come la realtà aumentata e i veicoli connessi. Il passo successivo è l\'estensione della copertura alle aree rurali, ancora largamente scoperte, entro il 2028 come previsto dagli accordi con il Ministero delle Imprese. I principali beneficiari industriali del 5G sono i settori automotive, manifatturiero e logistico, che stanno già implementando applicazioni di Industria 4.0 sulle nuove reti.',
                'category' => 'Tech',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Cybersecurity: gli attacchi alle aziende italiane aumentano del 60%',
                'subtitle' => 'Ransomware e phishing le minacce più diffuse, PMI nel mirino degli hacker',
                'body'     => 'Il rapporto annuale dell\'Agenzia per la Cybersicurezza Nazionale dipinge un quadro preoccupante: gli attacchi informatici contro aziende e infrastrutture italiane sono aumentati del 60% nell\'ultimo anno, con le piccole e medie imprese particolarmente vulnerabili per via della mancanza di risorse dedicate alla sicurezza informatica. Il ransomware rimane la minaccia più devastante economicamente, con un danno medio per attacco andato a buon fine che supera i 200.000 euro. Il phishing evoluto, spesso potenziato dall\'intelligenza artificiale generativa, è la porta d\'ingresso più comune per i criminali informatici. Il governo ha stanziato 150 milioni per un piano triennale di rafforzamento della cybersicurezza delle PMI, che prevede voucher per l\'acquisto di servizi di sicurezza e formazione obbligatoria per i responsabili IT. Gli esperti segnalano però che le risorse umane specializzate in sicurezza informatica sono insufficienti rispetto alla domanda.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Intelligenza artificiale generativa: come sta cambiando il lavoro dei professionisti italiani',
                'subtitle' => 'Avvocati, medici, designer e giornalisti raccontano la loro esperienza',
                'body'     => 'A due anni dall\'esplosione degli strumenti di intelligenza artificiale generativa, è possibile tracciare un bilancio più maturo del loro impatto sul lavoro dei professionisti italiani. Il quadro che emerge da una serie di interviste condotte in cinque città è complesso e sfumato: quasi il 70% dei professionisti che hanno adottato strumenti AI dichiara un aumento della produttività, ma solo il 30% ritiene che gli strumenti disponibili siano sufficientemente affidabili per essere utilizzati autonomamente senza revisione umana. Gli avvocati usano l\'AI per la ricerca giurisprudenziale e la redazione di prime bozze; i medici per l\'analisi di immagini diagnostiche; i designer per la generazione rapida di concept; i giornalisti per la ricerca e la sintesi di fonti. Il timore di perdere il lavoro è diffuso ma non prevalente: la maggioranza degli intervistati ritiene che l\'AI cambierà profondamente la natura del proprio lavoro senza eliminarlo.',
                'category' => 'Tech',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Robotica industriale: l\'Italia è seconda in Europa per installazioni',
                'subtitle' => 'Il settore automotive e l\'alimentare trainano l\'adozione nel manifatturiero',
                'body'     => 'L\'Italia ha consolidato il suo secondo posto in Europa per numero di robot industriali installati, superando Francia e Spagna e avvicinandosi alla Germania. I dati della International Federation of Robotics mostrano 74.000 robot attivi nelle fabbriche italiane a fine 2025, con una crescita del 18% sull\'anno precedente. Il settore automotive rimane il principale utilizzatore, seguito dall\'industria alimentare e bevande che ha registrato la crescita più rapida nel biennio 2024-2025. I robot collaborativi, o cobot, progettati per lavorare fianco a fianco con gli operatori umani senza barriere di sicurezza, rappresentano già il 25% delle nuove installazioni. Le PMI manifatturiere del Nord-Est sono le più dinamiche nell\'adozione, spinte dai finanziamenti del Piano Industria 4.0 e dalla necessità di compensare la carenza di manodopera specializzata.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Blockchain e sostenibilità: i progetti italiani che tracciano il made in Italy',
                'subtitle' => 'Dal vino al tessile, la filiera certificata conquista i consumatori internazionali',
                'body'     => 'Diverse aziende italiane dei settori food, moda e manifatturiero stanno adottando soluzioni blockchain per certificare l\'autenticità e la sostenibilità dei propri prodotti, rispondendo alla crescente domanda di trasparenza da parte dei consumatori internazionali. Un consorzio di cantine toscane ha lanciato un sistema di tracciabilità che permette di seguire ogni bottiglia di Brunello di Montalcino dalla vigna alla cantina, dal trasporto alla vendita, con tutti i dati immutabilmente registrati su blockchain pubblica. Nel settore tessile, alcune aziende biellesi usano tecnologie simili per garantire l\'origine italiana della lana e le condizioni di lavoro lungo tutta la filiera produttiva. Il mercato asiatico, in particolare Cina e Giappone, ha risposto con grande entusiasmo a queste iniziative, disposto a pagare un premium price per prodotti la cui autenticità è tecnologicamente verificabile.',
                'category' => 'Tech',
                'with_image' => false,
                'is_accepted' => false,
            ],
        ];

        foreach ($articles as $i => $data) {
            $writer = $writers[$i % $writers->count()];
            $category = $categories->firstWhere('name', $data['category'])
                ?? $categories->first();

            $imagePath = null;
            if ($data['with_image']) {
                $imagePath = $this->generateImage('articles');
            }

            $articleData = [
                'title'       => $data['title'],
                'slug'        => Str::slug($data['title']),
                'subtitle'    => $data['subtitle'],
                'body'        => $data['body'],
                'category_id' => $category->id,
                'user_id'     => $writer->id,
                'is_accepted' => $data['is_accepted'],
                'image'       => $imagePath,
            ];

            if ($data['is_accepted'] === true && $revisor) {
                $articleData['revisor_id'] = $revisor->id;
            }

            Article::create($articleData);
        }
    }

    private function generateImage(string $folder): string
    {
        $palettes = [
            [99, 179, 237],
            [104, 211, 145],
            [246, 173, 85],
            [252, 129, 129],
            [154, 117, 237],
            [237, 137, 104],
            [72, 187, 120],
            [66, 153, 225],
        ];

        [$r, $g, $b] = $palettes[array_rand($palettes)];

        $dir = storage_path("app/public/{$folder}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = 'seed_' . uniqid() . '.png';
        file_put_contents("{$dir}/{$filename}", $this->makePng($r, $g, $b, 400, 250));

        return "{$folder}/{$filename}";
    }

    private function makePng(int $r, int $g, int $b, int $w, int $h): string
    {
        $scanlines = '';
        for ($y = 0; $y < $h; $y++) {
            $scanlines .= "\x00"; // filter none
            for ($x = 0; $x < $w; $x++) {
                $scanlines .= chr($r) . chr($g) . chr($b);
            }
        }

        $png  = "\x89PNG\r\n\x1a\n";
        $png .= $this->pngChunk('IHDR', pack('NNCCCCC', $w, $h, 8, 2, 0, 0, 0));
        $png .= $this->pngChunk('IDAT', gzcompress($scanlines, 9));
        $png .= $this->pngChunk('IEND', '');

        return $png;
    }

    private function pngChunk(string $type, string $data): string
    {
        $chunk = $type . $data;
        return pack('N', strlen($data)) . $chunk . pack('N', crc32($chunk));
    }
}
