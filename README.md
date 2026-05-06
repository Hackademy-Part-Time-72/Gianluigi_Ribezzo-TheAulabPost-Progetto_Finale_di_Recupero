# The Aulab Post

Piattaforma editoriale multi-ruolo realizzata con **Laravel 13** e **PHP 8.3** come progetto finale del corso Aulab.  
Permette a scrittori di pubblicare articoli, a revisori di approvarli e ad amministratori di gestire l'intera piattaforma.

---

## Funzionalità per ruolo

### Ospite (non autenticato)
- Sfoglia tutti gli articoli pubblicati
- Filtra articoli per categoria o per autore
- Cerca articoli per titolo, sottotitolo, testo e tag
- Legge il dettaglio di ogni articolo con tempo di lettura stimato
- Visualizza la pagina "Lavora con noi"

### Utente registrato
- Tutte le funzionalità dell'ospite
- Invia una candidatura per diventare Autore, Revisore o Amministratore

### Autore (Writer)
- Pubblica nuovi articoli (titolo, sottotitolo, corpo, immagine, categoria, tag)
- Accede alla propria dashboard con articoli divisi per stato (in revisione / pubblicati / rifiutati)
- Legge i propri articoli anche prima che vengano approvati
- Modifica ed elimina i propri articoli rifiutati (l'articolo torna automaticamente in coda di revisione)

### Revisore
- Accede alla dashboard revisore con tutti gli articoli in attesa
- Accetta, rifiuta o rimanda in revisione ogni articolo
- Visualizza lo storico degli articoli già gestiti

### Amministratore
- Accede alla dashboard admin con tutte le candidature di ruolo ricevute
- Approva le richieste promuovendo gli utenti a Autore, Revisore o Amministratore
- Crea ed elimina tag
- Elimina categorie (solo se non hanno articoli associati)
- La sezione "Lavora con noi" non è visibile in navbar e footer

---

## Stack tecnologico

| Componente | Tecnologia |
|---|---|
| Framework | Laravel 13 |
| Linguaggio | PHP 8.3 |
| Autenticazione | Laravel Fortify |
| Ricerca full-text | Laravel Scout (database driver) |
| Database | MySQL |
| Frontend | Bootstrap 5 + Bootstrap Icons |
| Mail | SMTP (Mailtrap in sviluppo) |
| Storage | Laravel Storage (public disk) |

---

## Guida all'installazione

### Prerequisiti
- PHP >= 8.3
- Composer
- MySQL
- Node.js (opzionale, per assets)

### Passaggi

**1. Clona il repository**
```bash
git clone <url-del-repository> nome-cartella
cd nome-cartella
```

**2. Installa le dipendenze PHP**
```bash
composer install
```

**3. Crea il file di configurazione**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Configura il database nel file `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aulab_post
DB_USERNAME=root
DB_PASSWORD=
```

**5. Configura il server mail nel file `.env`** (es. Mailtrap per sviluppo)
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=il_tuo_username
MAIL_PASSWORD=la_tua_password
MAIL_FROM_ADDRESS="admin@theaulabpost.it"
```

**6. Esegui le migrazioni e il seeding**
```bash
php artisan migrate --seed
```

**7. Crea il link simbolico per lo storage**
```bash
php artisan storage:link
```

**8. Avvia il server di sviluppo**
```bash
php artisan serve
```

Il sito sarà disponibile in localhost al link [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Credenziali di test

Dopo il seeding sono disponibili i seguenti account:

| Ruolo | Email | Password |
|---|---|---|
| Amministratore | admin@theaulabpost.it | 12345678 |
| Revisore | revisor@theaulabpost.it | 12345678 |
| Autore | marco.rossi@theaulabpost.it | 12345678 |
| Autore | chiara.bianchi@theaulabpost.it | 12345678 |
| Autore | luca.ferrari@theaulabpost.it | 12345678 |

---

## Struttura del progetto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AdminController.php
│   │   ├── ArticleController.php
│   │   ├── PublicController.php
│   │   ├── RevisorController.php
│   │   └── WriterController.php
│   └── Middleware/
│       ├── UserIsAdmin.php
│       ├── UserIsRevisor.php
│       └── UserIsWriter.php
├── Models/
│   ├── Article.php
│   ├── Category.php
│   ├── Tag.php
│   └── User.php
└── Mail/
    └── WorkWithUsMail.php

resources/views/
├── admin/        # Dashboard amministratore
├── article/      # Creazione, modifica, lista, dettaglio, ricerca
├── auth/         # Login e registrazione
├── components/   # Layout, navbar, footer, tabelle riutilizzabili
├── revisor/      # Dashboard revisore
├── writer/       # Dashboard autore
├── careers.blade.php
└── homepage.blade.php
```

---

## Note aggiuntive

- Le immagini caricate dagli autori vengono salvate in `storage/app/public/articles/`
- Gli articoli non accettati sono visibili solo al proprietario, ai revisori e agli amministratori
- La ricerca full-text copre titolo, sottotitolo, corpo del testo e tag associati
- Il tempo di lettura è stimato sulla base di 200 parole al minuto

---

*README generato con il supporto di [Claude](https://claude.ai) (Anthropic) — Gianluigi Ribezzo, 2026*
