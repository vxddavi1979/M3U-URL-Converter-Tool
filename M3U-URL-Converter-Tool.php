<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M3U URL Converter Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            line-height: 1.6;
            transition: background-color 0.3s, color 0.3s;
        }
        body.dark-mode {
            background-color: #1e1e1e;
            color: #c9c9c9;
        }
        .language-selector {
            text-align: right;
            margin-bottom: 15px;
        }
        .language-selector select {
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background-color: white;
            cursor: pointer;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .container {
            background-color: #2c2c2c;
            color: #c9c9c9;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            transition: color 0.3s;
        }
        .dark-mode h1 {
            color: #bb86fc;
            border-bottom: 2px solid #555;
        }
        .input-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
            transition: color 0.3s;
        }
        .dark-mode label {
            color: #c9c9c9;
        }
        input[type="text"], input[type="url"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #fff;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode input[type="text"], .dark-mode input[type="url"] {
            background-color: #3a3a3a;
            color: #c9c9c9;
        }
        input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .result {
            background-color: #3a3a3a;
            color: #c9c9c9;
        }
        .result h3 {
            margin-top: 0;
            color: #2c3e50;
            transition: color 0.3s;
        }
        .dark-mode .result h3 {
            color: #bb86fc;
        }
        .url-box {
            padding: 15px;
            background-color: #eee;
            border-radius: 4px;
            margin: 15px 0;
            word-break: break-all;
            font-family: monospace;
            font-size: 14px;
            border: 1px dashed #ccc;
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .url-box {
            background-color: #4a4a4a;
            color: #c9c9c9;
        }
        .copy-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .copy-button:hover {
            background-color: #2980b9;
        }
        .instructions {
            margin-top: 40px;
            background-color: #edf7ed;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .instructions {
            background-color: #3a3a3a;
            border-left: 4px solid #bb86fc;
            color: #c9c9c9;
        }
        .instructions h3 {
            color: #2c3e50;
            margin-top: 0;
            transition: color 0.3s;
        }
        .dark-mode .instructions h3 {
            color: #bb86fc;
        }
        .steps {
            padding-left: 20px;
        }
        .step {
            margin-bottom: 15px;
        }
        .step-number {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            width: 25px;
            height: 25px;
            text-align: center;
            border-radius: 50%;
            margin-right: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .dark-mode .step-number {
            background-color: #bb86fc;
        }
        .info {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
            background-color: #f1f8ff;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #3498db;
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .info {
            background-color: #3a3a3a;
            border-left: 4px solid #bb86fc;
            color: #c9c9c9;
        }
        .info h3 {
            margin-top: 0;
            color: #3498db;
            transition: color 0.3s;
        }
        .dark-mode .info h3 {
            color: #bb86fc;
        }
        .success-message {
            display: none;
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            text-align: center;
        }
        .dark-mode .success-message {
            background-color: #2f3a2f;
            color: #a1d9a1;
        }
        .dark-mode-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .dark-mode-toggle label {
            cursor: pointer;
            font-size: 16px;
            color: #444;
            transition: color 0.3s;
        }
        .dark-mode .dark-mode-toggle label {
            color: #c9c9c9;
        }
        .dark-mode-toggle input[type="checkbox"] {
            display: none;
        }
        .dark-mode-toggle .slider {
            width: 40px;
            height: 20px;
            background-color: #ccc;
            border-radius: 10px;
            position: relative;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .dark-mode-toggle .slider:before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            background-color: white;
            border-radius: 50%;
            top: 1px;
            left: 1px;
            transition: transform 0.3s;
        }
        .dark-mode-toggle input:checked + .slider {
            background-color: #4CAF50;
        }
        .dark-mode-toggle input:checked + .slider:before {
            transform: translateX(18px);
        }
    </style>
</head>
<body>
    <div class="dark-mode-toggle">
        <label>
            <input type="checkbox" id="darkModeToggle">
            <span class="slider"></span>
        </label>
    </div>
<div class="language-selector">
        <select id="languageSelect" onchange="changeLanguage()">
            <option value="nl">🇳🇱 Nederlands</option>
            <option value="en">🇬🇧 English</option>
            <option value="de">🇩🇪 Deutsch</option>
            <option value="fr">🇫🇷 Français</option>
            <option value="es">🇪🇸 Español</option>
            <option value="it">🇮🇹 Italiano</option>
            <option value="pt">🇵🇹 Português</option>
            <option value="ru">🇷🇺 Русский</option>
            <option value="ar">🇦🇪 العربية</option>
            <option value="tr">🇹🇷 Türkçe</option>
            <option value="pl">🇵🇱 Polski</option>
            <option value="sv">🇸🇪 Svenska</option>
        </select>
    </div>
    <div class="container">
        <h1 id="pageTitle">M3U URL Converter voor IPTV</h1>
        <div id="privacyNotice" style="text-align: center; background-color: #e8f5e9; padding: 10px; border-radius: 4px; margin-bottom: 20px; border: 2px solid #4CAF50;">
            <p id="privacyText" style="font-weight: bold; color: #2e7d32; margin: 0;">
                <span style="display: inline-block; margin-right: 5px;">🔒</span>
                PRIVACY VERZEKERD: Er wordt NIETS opgeslagen op onze servers of elders!
            </p>
        </div>

        <div class="instructions">
            <h3 id="howToUseTitle">Hoe deze tool te gebruiken:</h3>
            <div class="steps">
                <div class="step">
                    <span class="step-number">1</span>
                    <strong id="step1">Voer de basis-URL in</strong> van je IPTV-aanbieder
                    (bijvoorbeeld: http://voorbeeld.iptv.nl:8080)
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <strong id="step2">Vul je gebruikersnaam en wachtwoord in</strong> die je van je IPTV-aanbieder hebt ontvangen
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <strong id="step3">Klik op de knop "Converteer"</strong> om je M3U-link te genereren
                </div>
                <div class="step">
                    <span class="step-number">4</span>
                    <strong id="step4">Kopieer de gegenereerde URL</strong> en gebruik deze in je IPTV-speler (zoals VLC, IPTV Player, Smart TV, etc.)
                </div>
            </div>
        </div>

        <div class="input-group">
            <label id="baseUrlLabel" for="baseUrl">Basis URL van je IPTV-aanbieder:</label>
            <input type="url" id="baseUrl" placeholder="Bijvoorbeeld: http://voorbeeld.iptv.nl:8080" required>
        </div>

        <div class="input-group">
            <label id="usernameLabel" for="username">Gebruikersnaam:</label>
            <input type="text" id="username" placeholder="Je gebruikersnaam">
        </div>

        <div class="input-group">
            <label id="passwordLabel" for="password">Wachtwoord:</label>
            <input type="text" id="password" placeholder="Je wachtwoord">
        </div>

        <button id="convertButton" onclick="convertUrl()">Converteer naar M3U-link</button>
        <div id="successMessage" class="success-message">URL is succesvol gekopieerd naar het klembord!</div>

        <div class="result" id="result" style="display: none;">
            <h3 id="resultReady">Je M3U URL is klaar:</h3>
            <div class="url-box" id="convertedUrl"></div>
            <button id="copyButton" class="copy-button" onclick="copyToClipboard()">Kopieer naar klembord</button>
        </div>

        <div class="info">
            <h3 id="whatIsM3u">Wat is een M3U URL?</h3>
            <p id="m3uExplanation">Een M3U URL is een speciale link die door IPTV-spelers wordt gebruikt om toegang te krijgen tot live TV, films en andere content van je IPTV-aanbieder.</p>

            <h3 id="howToUse">Hoe te gebruiken:</h3>
            <p id="howToUseExplanation">Na het genereren van de URL, kun je deze gebruiken in elke IPTV-speler zoals:</p>
            <ul>
                <li id="playerVlc">VLC Media Player (Media → Netwerkstream openen)</li>
                <li id="playerApps">IPTV Apps op smartphones of tablets</li>
                <li id="playerSmartTv">Smart TV's met IPTV-ondersteuning</li>
                <li id="playerAndroid">Android TV-boxen</li>
                <li id="playerOther">IPTV-spelers zoals IPTV Smarters, GSE IPTV, enz.</li>
            </ul>

            <h3 id="important">Belangrijk:</h3>
            <p id="privacyGuarantee"><strong>PRIVACY-GARANTIE:</strong> Deze tool slaat NIETS op - geen enkele informatie wordt opgeslagen op onze servers of elders. Alles werkt volledig lokaal in je eigen browser.</p>
            <p id="dataUsage">Je gegevens worden alleen gebruikt om de URL te genereren en verlaten nooit je apparaat. Er is geen database en er worden geen logs bijgehouden.</p>
            <p id="credentialsWarning">Bewaar je inloggegevens op een veilige plaats en deel deze niet met anderen.</p>
        </div>
    </div>

    <script>
        // Taalvertalingen
        const translations = {
            'nl': {
                'title': 'M3U URL Converter voor IPTV',
                'privacy_notice': 'PRIVACY VERZEKERD: Er wordt NIETS opgeslagen op onze servers of elders!',
                'how_to_use': 'Hoe deze tool te gebruiken:',
                'step1': 'Voer de basis-URL in van je IPTV-aanbieder (bijvoorbeeld: http://voorbeeld.iptv.nl:8080)',
                'step2': 'Vul je gebruikersnaam en wachtwoord in die je van je IPTV-aanbieder hebt ontvangen',
                'step3': 'Klik op de knop "Converteer" om je M3U-link te genereren',
                'step4': 'Kopieer de gegenereerde URL en gebruik deze in je IPTV-speler (zoals VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'Basis URL van je IPTV-aanbieder:',
                'base_url_placeholder': 'Bijvoorbeeld: http://voorbeeld.iptv.nl:8080',
                'username_label': 'Gebruikersnaam:',
                'username_placeholder': 'Je gebruikersnaam',
                'password_label': 'Wachtwoord:',
                'password_placeholder': 'Je wachtwoord',
                'convert_button': 'Converteer naar M3U-link',
                'success_message': 'URL is succesvol gekopieerd naar het klembord!',
                'result_ready': 'Je M3U URL is klaar:',
                'copy_button': 'Kopieer naar klembord',
                'what_is_m3u': 'Wat is een M3U URL?',
                'm3u_explanation': 'Een M3U URL is een speciale link die door IPTV-spelers wordt gebruikt om toegang te krijgen tot live TV, films en andere content van je IPTV-aanbieder.',
                'how_to_use_title': 'Hoe te gebruiken:',
                'how_to_use_explanation': 'Na het genereren van de URL, kun je deze gebruiken in elke IPTV-speler zoals:',
                'player_vlc': 'VLC Media Player (Media → Netwerkstream openen)',
                'player_apps': 'IPTV Apps op smartphones of tablets',
                'player_smart_tv': 'Smart TV\'s met IPTV-ondersteuning',
                'player_android': 'Android TV-boxen',
                'player_other': 'IPTV-spelers zoals IPTV Smarters, GSE IPTV, enz.',
                'important': 'Belangrijk:',
                'privacy_guarantee': 'PRIVACY-GARANTIE: Deze tool slaat NIETS op - geen enkele informatie wordt opgeslagen op onze servers of elders. Alles werkt volledig lokaal in je eigen browser.',
                'data_usage': 'Je gegevens worden alleen gebruikt om de URL te genereren en verlaten nooit je apparaat. Er is geen database en er worden geen logs bijgehouden.',
                'credentials_warning': 'Bewaar je inloggegevens op een veilige plaats en deel deze niet met anderen.',
                'validation_error': 'Voer een geldige basis URL in'
            },
            'en': {
                'title': 'M3U URL Converter for IPTV',
                'privacy_notice': 'PRIVACY GUARANTEED: NOTHING is stored on our servers or elsewhere!',
                'how_to_use': 'How to use this tool:',
                'step1': 'Enter the base URL of your IPTV provider (for example: http://example.iptv.com:8080)',
                'step2': 'Fill in your username and password that you received from your IPTV provider',
                'step3': 'Click the "Convert" button to generate your M3U link',
                'step4': 'Copy the generated URL and use it in your IPTV player (such as VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'Base URL of your IPTV provider:',
                'base_url_placeholder': 'For example: http://example.iptv.com:8080',
                'username_label': 'Username:',
                'username_placeholder': 'Your username',
                'password_label': 'Password:',
                'password_placeholder': 'Your password',
                'convert_button': 'Convert to M3U link',
                'success_message': 'URL successfully copied to clipboard!',
                'result_ready': 'Your M3U URL is ready:',
                'copy_button': 'Copy to clipboard',
                'what_is_m3u': 'What is an M3U URL?',
                'm3u_explanation': 'An M3U URL is a special link used by IPTV players to access live TV, movies, and other content from your IPTV provider.',
                'how_to_use_title': 'How to use:',
                'how_to_use_explanation': 'After generating the URL, you can use it in any IPTV player such as:',
                'player_vlc': 'VLC Media Player (Media → Open Network Stream)',
                'player_apps': 'IPTV Apps on smartphones or tablets',
                'player_smart_tv': 'Smart TVs with IPTV support',
                'player_android': 'Android TV boxes',
                'player_other': 'IPTV players like IPTV Smarters, GSE IPTV, etc.',
                'important': 'Important:',
                'privacy_guarantee': 'PRIVACY GUARANTEE: This tool stores NOTHING - no information is stored on our servers or elsewhere. Everything works completely locally in your own browser.',
                'data_usage': 'Your data is only used to generate the URL and never leaves your device. There is no database and no logs are kept.',
                'credentials_warning': 'Keep your login credentials in a safe place and do not share them with others.',
                'validation_error': 'Please enter a valid base URL'
            },
            'de': {
                'title': 'M3U URL-Konverter für IPTV',
                'privacy_notice': 'DATENSCHUTZ GARANTIERT: NICHTS wird auf unseren Servern oder anderswo gespeichert!',
                'how_to_use': 'Wie man dieses Tool verwendet:',
                'step1': 'Geben Sie die Basis-URL Ihres IPTV-Anbieters ein (zum Beispiel: http://beispiel.iptv.de:8080)',
                'step2': 'Geben Sie Ihren Benutzernamen und Ihr Passwort ein, die Sie von Ihrem IPTV-Anbieter erhalten haben',
                'step3': 'Klicken Sie auf die Schaltfläche "Konvertieren", um Ihren M3U-Link zu generieren',
                'step4': 'Kopieren Sie die generierte URL und verwenden Sie sie in Ihrem IPTV-Player (wie VLC, IPTV Player, Smart TV, usw.)',
                'base_url_label': 'Basis-URL Ihres IPTV-Anbieters:',
                'base_url_placeholder': 'Zum Beispiel: http://beispiel.iptv.de:8080',
                'username_label': 'Benutzername:',
                'username_placeholder': 'Ihr Benutzername',
                'password_label': 'Passwort:',
                'password_placeholder': 'Ihr Passwort',
                'convert_button': 'In M3U-Link konvertieren',
                'success_message': 'URL erfolgreich in die Zwischenablage kopiert!',
                'result_ready': 'Ihre M3U-URL ist fertig:',
                'copy_button': 'In die Zwischenablage kopieren',
                'what_is_m3u': 'Was ist eine M3U-URL?',
                'm3u_explanation': 'Eine M3U-URL ist ein spezieller Link, der von IPTV-Playern verwendet wird, um auf Live-TV, Filme und andere Inhalte Ihres IPTV-Anbieters zuzugreifen.',
                'how_to_use_title': 'Wie zu verwenden:',
                'how_to_use_explanation': 'Nach dem Generieren der URL können Sie diese in jedem IPTV-Player verwenden, wie zum Beispiel:',
                'player_vlc': 'VLC Media Player (Medien → Netzwerk-Stream öffnen)',
                'player_apps': 'IPTV-Apps auf Smartphones oder Tablets',
                'player_smart_tv': 'Smart-TVs mit IPTV-Unterstützung',
                'player_android': 'Android-TV-Boxen',
                'player_other': 'IPTV-Player wie IPTV Smarters, GSE IPTV, usw.',
                'important': 'Wichtig:',
                'privacy_guarantee': 'DATENSCHUTZ-GARANTIE: Dieses Tool speichert NICHTS - keine Informationen werden auf unseren Servern oder anderswo gespeichert. Alles funktioniert vollständig lokal in Ihrem eigenen Browser.',
                'data_usage': 'Ihre Daten werden nur zur Generierung der URL verwendet und verlassen niemals Ihr Gerät. Es gibt keine Datenbank und es werden keine Protokolle geführt.',
                'credentials_warning': 'Bewahren Sie Ihre Anmeldeinformationen an einem sicheren Ort auf und teilen Sie sie nicht mit anderen.',
                'validation_error': 'Bitte geben Sie eine gültige Basis-URL ein'
            },
            'fr': {
                'title': 'Convertisseur d\'URL M3U pour IPTV',
                'privacy_notice': 'CONFIDENTIALITÉ GARANTIE : RIEN n\'est stocké sur nos serveurs ou ailleurs !',
                'how_to_use': 'Comment utiliser cet outil :',
                'step1': 'Entrez l\'URL de base de votre fournisseur IPTV (par exemple : http://exemple.iptv.fr:8080)',
                'step2': 'Remplissez votre nom d\'utilisateur et votre mot de passe que vous avez reçus de votre fournisseur IPTV',
                'step3': 'Cliquez sur le bouton "Convertir" pour générer votre lien M3U',
                'step4': 'Copiez l\'URL générée et utilisez-la dans votre lecteur IPTV (comme VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'URL de base de votre fournisseur IPTV :',
                'base_url_placeholder': 'Par exemple : http://exemple.iptv.fr:8080',
                'username_label': 'Nom d\'utilisateur :',
                'username_placeholder': 'Votre nom d\'utilisateur',
                'password_label': 'Mot de passe :',
                'password_placeholder': 'Votre mot de passe',
                'convert_button': 'Convertir en lien M3U',
                'success_message': 'URL copiée avec succès dans le presse-papiers !',
                'result_ready': 'Votre URL M3U est prête :',
                'copy_button': 'Copier dans le presse-papiers',
                'what_is_m3u': 'Qu\'est-ce qu\'une URL M3U ?',
                'm3u_explanation': 'Une URL M3U est un lien spécial utilisé par les lecteurs IPTV pour accéder à la télévision en direct, aux films et à d\'autres contenus de votre fournisseur IPTV.',
                'how_to_use_title': 'Comment utiliser :',
                'how_to_use_explanation': 'Après avoir généré l\'URL, vous pouvez l\'utiliser dans n\'importe quel lecteur IPTV tel que :',
                'player_vlc': 'VLC Media Player (Média → Ouvrir un flux réseau)',
                'player_apps': 'Applications IPTV sur smartphones ou tablettes',
                'player_smart_tv': 'Smart TV avec support IPTV',
                'player_android': 'Boîtiers Android TV',
                'player_other': 'Lecteurs IPTV comme IPTV Smarters, GSE IPTV, etc.',
                'important': 'Important :',
                'privacy_guarantee': 'GARANTIE DE CONFIDENTIALITÉ : Cet outil ne stocke RIEN - aucune information n\'est stockée sur nos serveurs ou ailleurs. Tout fonctionne complètement localement dans votre propre navigateur.',
                'data_usage': 'Vos données sont uniquement utilisées pour générer l\'URL et ne quittent jamais votre appareil. Il n\'y a pas de base de données et aucun journal n\'est conservé.',
                'credentials_warning': 'Conservez vos identifiants de connexion dans un endroit sûr et ne les partagez pas avec d\'autres.',
                'validation_error': 'Veuillez entrer une URL de base valide'
            },
            'es': {
                'title': 'Convertidor de URL M3U para IPTV',
                'privacy_notice': '¡PRIVACIDAD GARANTIZADA: NO se almacena NADA en nuestros servidores o en otro lugar!',
                'how_to_use': 'Cómo usar esta herramienta:',
                'step1': 'Introduce la URL base de tu proveedor de IPTV (por ejemplo: http://ejemplo.iptv.es:8080)',
                'step2': 'Rellena tu nombre de usuario y contraseña que recibiste de tu proveedor de IPTV',
                'step3': 'Haz clic en el botón "Convertir" para generar tu enlace M3U',
                'step4': 'Copia la URL generada y úsala en tu reproductor IPTV (como VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'URL base de tu proveedor de IPTV:',
                'base_url_placeholder': 'Por ejemplo: http://ejemplo.iptv.es:8080',
                'username_label': 'Nombre de usuario:',
                'username_placeholder': 'Tu nombre de usuario',
                'password_label': 'Contraseña:',
                'password_placeholder': 'Tu contraseña',
                'convert_button': 'Convertir a enlace M3U',
                'success_message': '¡URL copiada con éxito al portapapeles!',
                'result_ready': 'Tu URL M3U está lista:',
                'copy_button': 'Copiar al portapapeles',
                'what_is_m3u': '¿Qué es una URL M3U?',
                'm3u_explanation': 'Una URL M3U es un enlace especial utilizado por los reproductores IPTV para acceder a TV en vivo, películas y otro contenido de tu proveedor de IPTV.',
                'how_to_use_title': 'Cómo usar:',
                'how_to_use_explanation': 'Después de generar la URL, puedes usarla en cualquier reproductor IPTV como:',
                'player_vlc': 'VLC Media Player (Media → Abrir flujo de red)',
                'player_apps': 'Aplicaciones IPTV en smartphones o tablets',
                'player_smart_tv': 'Smart TVs con soporte IPTV',
                'player_android': 'Cajas Android TV',
                'player_other': 'Reproductores IPTV como IPTV Smarters, GSE IPTV, etc.',
                'important': 'Importante:',
                'privacy_guarantee': 'GARANTÍA DE PRIVACIDAD: Esta herramienta no almacena NADA - no se guarda ninguna información en nuestros servidores o en otro lugar. Todo funciona completamente local en tu propio navegador.',
                'data_usage': 'Tus datos solo se utilizan para generar la URL y nunca salen de tu dispositivo. No hay base de datos y no se mantienen registros.',
                'credentials_warning': 'Mantén tus credenciales de inicio de sesión en un lugar seguro y no las compartas con otros.',
                'validation_error': 'Por favor, introduce una URL base válida'
            },
            'it': {
                'title': 'Convertitore URL M3U per IPTV',
                'privacy_notice': 'PRIVACY GARANTITA: NULLA viene memorizzato sui nostri server o altrove!',
                'how_to_use': 'Come usare questo strumento:',
                'step1': 'Inserisci l\'URL base del tuo provider IPTV (ad esempio: http://esempio.iptv.it:8080)',
                'step2': 'Inserisci il tuo nome utente e la password che hai ricevuto dal tuo provider IPTV',
                'step3': 'Clicca sul pulsante "Converti" per generare il tuo link M3U',
                'step4': 'Copia l\'URL generato e usalo nel tuo player IPTV (come VLC, IPTV Player, Smart TV, ecc.)',
                'base_url_label': 'URL base del tuo provider IPTV:',
                'base_url_placeholder': 'Ad esempio: http://esempio.iptv.it:8080',
                'username_label': 'Nome utente:',
                'username_placeholder': 'Il tuo nome utente',
                'password_label': 'Password:',
                'password_placeholder': 'La tua password',
                'convert_button': 'Converti in link M3U',
                'success_message': 'URL copiato con successo negli appunti!',
                'result_ready': 'Il tuo URL M3U è pronto:',
                'copy_button': 'Copia negli appunti',
                'what_is_m3u': 'Cos\'è un URL M3U?',
                'm3u_explanation': 'Un URL M3U è un link speciale utilizzato dai player IPTV per accedere a TV in diretta, film e altri contenuti dal tuo provider IPTV.',
                'how_to_use_title': 'Come utilizzare:',
                'how_to_use_explanation': 'Dopo aver generato l\'URL, puoi usarlo in qualsiasi player IPTV come:',
                'player_vlc': 'VLC Media Player (Media → Apri flusso di rete)',
                'player_apps': 'App IPTV su smartphone o tablet',
                'player_smart_tv': 'Smart TV con supporto IPTV',
                'player_android': 'Box Android TV',
                'player_other': 'Player IPTV come IPTV Smarters, GSE IPTV, ecc.',
                'important': 'Importante:',
                'privacy_guarantee': 'GARANZIA DI PRIVACY: Questo strumento non memorizza NULLA - nessuna informazione viene salvata sui nostri server o altrove. Tutto funziona completamente in locale nel tuo browser.',
                'data_usage': 'I tuoi dati vengono utilizzati solo per generare l\'URL e non lasciano mai il tuo dispositivo. Non c\'è alcun database e non vengono conservati log.',
                'credentials_warning': 'Conserva le tue credenziali di accesso in un luogo sicuro e non condividerle con altri.',
                'validation_error': 'Inserisci un URL base valido'
            },
            'pt': {
                'title': 'Conversor de URL M3U para IPTV',
                'privacy_notice': 'PRIVACIDADE GARANTIDA: NADA é armazenado em nossos servidores ou em qualquer outro lugar!',
                'how_to_use': 'Como usar esta ferramenta:',
                'step1': 'Digite a URL base do seu provedor IPTV (por exemplo: http://exemplo.iptv.pt:8080)',
                'step2': 'Preencha seu nome de usuário e senha que você recebeu do seu provedor IPTV',
                'step3': 'Clique no botão "Converter" para gerar seu link M3U',
                'step4': 'Copie a URL gerada e use-a em seu player IPTV (como VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'URL base do seu provedor IPTV:',
                'base_url_placeholder': 'Por exemplo: http://exemplo.iptv.pt:8080',
                'username_label': 'Nome de usuário:',
                'username_placeholder': 'Seu nome de usuário',
                'password_label': 'Senha:',
                'password_placeholder': 'Sua senha',
                'convert_button': 'Converter para link M3U',
                'success_message': 'URL copiada com sucesso para a área de transferência!',
                'result_ready': 'Sua URL M3U está pronta:',
                'copy_button': 'Copiar para a área de transferência',
                'what_is_m3u': 'O que é uma URL M3U?',
                'm3u_explanation': 'Uma URL M3U é um link especial usado por players IPTV para acessar TV ao vivo, filmes e outros conteúdos do seu provedor IPTV.',
                'how_to_use_title': 'Como usar:',
                'how_to_use_explanation': 'Após gerar a URL, você pode usá-la em qualquer player IPTV como:',
                'player_vlc': 'VLC Media Player (Mídia → Abrir fluxo de rede)',
                'player_apps': 'Aplicativos IPTV em smartphones ou tablets',
                'player_smart_tv': 'Smart TVs com suporte a IPTV',
                'player_android': 'Boxes Android TV',
                'player_other': 'Players IPTV como IPTV Smarters, GSE IPTV, etc.',
                'important': 'Importante:',
                'privacy_guarantee': 'GARANTIA DE PRIVACIDADE: Esta ferramenta não armazena NADA - nenhuma informação é salva em nossos servidores ou em qualquer outro lugar. Tudo funciona completamente local em seu próprio navegador.',
                'data_usage': 'Seus dados são usados apenas para gerar a URL e nunca saem do seu dispositivo. Não há banco de dados e nenhum registro é mantido.',
                'credentials_warning': 'Mantenha suas credenciais de login em um local seguro e não as compartilhe com outras pessoas.',
                'validation_error': 'Por favor, insira uma URL base válida'
            },
            'ru': {
                'title': 'Конвертер URL M3U для IPTV',
                'privacy_notice': 'КОНФИДЕНЦИАЛЬНОСТЬ ГАРАНТИРОВАНА: НИЧЕГО не хранится на наших серверах или где-либо еще!',
                'how_to_use': 'Как пользоваться этим инструментом:',
                'step1': 'Введите базовый URL вашего IPTV-провайдера (например: http://пример.iptv.ru:8080)',
                'step2': 'Заполните имя пользователя и пароль, которые вы получили от вашего IPTV-провайдера',
                'step3': 'Нажмите кнопку "Конвертировать", чтобы сгенерировать вашу M3U-ссылку',
                'step4': 'Скопируйте сгенерированный URL и используйте его в вашем IPTV-плеере (например, VLC, IPTV Player, Smart TV и т.д.)',
                'base_url_label': 'Базовый URL вашего IPTV-провайдера:',
                'base_url_placeholder': 'Например: http://пример.iptv.ru:8080',
                'username_label': 'Имя пользователя:',
                'username_placeholder': 'Ваше имя пользователя',
                'password_label': 'Пароль:',
                'password_placeholder': 'Ваш пароль',
                'convert_button': 'Конвертировать в M3U-ссылку',
                'success_message': 'URL успешно скопирован в буфер обмена!',
                'result_ready': 'Ваш M3U URL готов:',
                'copy_button': 'Копировать в буфер обмена',
                'what_is_m3u': 'Что такое M3U URL?',
                'm3u_explanation': 'M3U URL — это специальная ссылка, используемая IPTV-плеерами для доступа к прямым трансляциям, фильмам и другому контенту от вашего IPTV-провайдера.',
                'how_to_use_title': 'Как использовать:',
                'how_to_use_explanation': 'После генерации URL вы можете использовать его в любом IPTV-плеере, таком как:',
                'player_vlc': 'VLC Media Player (Медиа → Открыть сетевой поток)',
                'player_apps': 'IPTV-приложения на смартфонах или планшетах',
                'player_smart_tv': 'Smart TV с поддержкой IPTV',
                'player_android': 'Android TV-приставки',
                'player_other': 'IPTV-плееры, такие как IPTV Smarters, GSE IPTV, etc.',
                'important': 'Важно:',
                'privacy_guarantee': 'ГАРАНТИЯ КОНФИДЕНЦИАЛЬНОСТИ: Этот инструмент не сохраняет НИЧЕГО - никакая информация не сохраняется на наших серверах или где-либо еще. Все работает полностью локально в вашем собственном браузере.',
                'data_usage': 'Ваши данные используются только для генерации URL и никогда не покидают ваше устройство. Нет базы данных и не ведутся логи.',
                'credentials_warning': 'Храните свои учетные данные в безопасном месте и не делитесь ими с другими.',
                'validation_error': 'Пожалуйста, введите действительный базовый URL'
            },
            'ar': {
                'title': 'محول عنوان URL لـ M3U لـ IPTV',
                'privacy_notice': 'الخصوصية مضمونة: لا تخزن أي بيانات على خوادمنا أو في أي مكان آخر!',
                'how_to_use': 'كيفية استخدام هذه الأداة:',
                'step1': 'أدخل عنوان URL الأساسي لمزود خدمة IPTV الخاص بك (على سبيل المثال: http://example.iptv.com:8080)',
                'step2': 'أدخل اسم المستخدم وكلمة المرور اللذين تلقيتهما من مزود خدمة IPTV الخاص بك',
                'step3': 'انقر على الزر "تحويل" لإنشاء رابط M3U الخاص بك',
                'step4': 'انسخ عنوان URL المُنشأ واستخدمه في مشغل IPTV الخاص بك (مثل VLC، أو IPTV Player، أو Smart TV، إلخ)',
                'base_url_label': 'عنوان URL الأساسي لمزود خدمة IPTV الخاص بك:',
                'base_url_placeholder': 'على سبيل المثال: http://example.iptv.com:8080',
                'username_label': 'اسم المستخدم:',
                'username_placeholder': 'اسم المستخدم الخاص بك',
                'password_label': 'كلمة المرور:',
                'password_placeholder': 'كلمة المرور الخاصة بك',
                'convert_button': 'تحويل إلى رابط M3U',
                'success_message': 'تم نسخ عنوان URL بنجاح إلى الحافظة!',
                'result_ready': 'عنوان URL الخاص بـ M3U جاهز:',
                'copy_button': 'نسخ إلى الحافظة',
                'what_is_m3u': 'ما هو عنوان URL لـ M3U؟',
                'm3u_explanation': 'عنوان URL لـ M3U هو رابط خاص يستخدمه مشغلو IPTV للوصول إلى البث المباشر للتلفزيون، والأفلام، ومحتوى آخر من مزود خدمة IPTV الخاص بك.',
                'how_to_use_title': 'كيفية الاستخدام:',
                'how_to_use_explanation': 'بعد إنشاء عنوان URL، يمكنك استخدامه في أي مشغل IPTV مثل:',
                'player_vlc': 'مشغل الوسائط VLC (الوسائط → فتح بث الشبكة)',
                'player_apps': 'تطبيقات IPTV على الهواتف الذكية أو الأجهزة اللوحية',
                'player_smart_tv': 'التلفزيونات الذكية التي تدعم IPTV',
                'player_android': 'أجهزة Android TV',
                'player_other': 'مشغلات IPTV مثل IPTV Smarters، وGSE IPTV، إلخ.',
                'important': 'مهم:',
                'privacy_guarantee': 'ضمان الخصوصية: لا تخزن هذه الأداة أي شيء - لا تُخزن أي معلومات على خوادمنا أو في أي مكان آخر. كل شيء يعمل بشكل محلي تمامًا في متصفحك الخاص.',
                'data_usage': 'تُستخدم بياناتك فقط لإنشاء عنوان URL ولا تغادر جهازك أبدًا. لا توجد قاعدة بيانات ولا تُحفظ سجلات.',
                'credentials_warning': 'احتفظ ببيانات تسجيل الدخول الخاصة بك في مكان آمن ولا تشاركها مع الآخرين.',
                'validation_error': 'الرجاء إدخال عنوان URL أساسي صالح'
            },
            'tr': {
                'title': 'IPTV için M3U URL Dönüştürücü',
                'privacy_notice': 'GİZLİLİK GARANTİSİ: SUNUCULARIMIZDA VEYA BAŞKA HERHANGİ BİR YERDE HİÇBİR ŞEY SAKLANMAZ!',
                'how_to_use': 'Bu araç nasıl kullanılır:',
                'step1': 'IPTV sağlayıcınızın temel URL\'sini girin (örneğin: http://example.iptv.com:8080)',
                'step2': 'IPTV sağlayıcınızdan aldığınız kullanıcı adınızı ve şifrenizi girin',
                'step3': 'M3U bağlantınızı oluşturmak için "Dönüştür" düğmesine tıklayın',
                'step4': 'Oluşturulan URL\'yi kopyalayın ve IPTV oynatıcınızda kullanın (örneğin, VLC, IPTV Player, Smart TV, vb.)',
                'base_url_label': 'IPTV sağlayıcınızın temel URL\'si:',
                'base_url_placeholder': 'Örneğin: http://example.iptv.com:8080',
                'username_label': 'Kullanıcı adı:',
                'username_placeholder': 'Kullanıcı adınız',
                'password_label': 'Şifre:',
                'password_placeholder': 'Şifreniz',
                'convert_button': 'M3U bağlantısına dönüştür',
                'success_message': 'URL panoya başarıyla kopyalandı!',
                'result_ready': 'M3U URL\'niz hazır:',
                'copy_button': 'Panoya kopyala',
                'what_is_m3u': 'M3U URL nedir?',
                'm3u_explanation': 'M3U URL, IPTV oynatıcılarının IPTV sağlayıcınızdan canlı TV, filmler ve diğer içeriklere erişmek için kullandığı özel bir bağlantıdır.',
                'how_to_use_title': 'Nasıl kullanılır:',
                'how_to_use_explanation': 'URL\'yi oluşturduktan sonra, aşağıdaki IPTV oynatıcılarında kullanabilirsiniz:',
                'player_vlc': 'VLC Media Player (Medya → Ağ Akışını Aç)',
                'player_apps': 'Akıllı telefonlar veya tabletlerdeki IPTV uygulamaları',
                'player_smart_tv': 'IPTV desteği olan Akıllı TV\'ler',
                'player_android': 'Android TV kutuları',
                'player_other': 'IPTV Smarters, GSE IPTV vb. gibi IPTV oynatıcıları.',
                'important': 'Önemli:',
                'privacy_guarantee': 'GİZLİLİK GARANTİSİ: Bu araç HİÇBİR ŞEY SAKLAMAZ - sunucularımızda veya başka herhangi bir yerde hiçbir bilgi saklanmaz. Her şey tamamen kendi tarayıcınızda yerel olarak çalışır.',
                'data_usage': 'Verileriniz yalnızca URL oluşturmak için kullanılır ve hiçbir zaman cihazınızı terk etmez. Veritabanı yoktur ve kayıtlar tutulmaz.',
                'credentials_warning': 'Giriş bilgilerinizi güvenli bir yerde saklayın ve başkalarıyla paylaşmayın.',
                'validation_error': 'Lütfen geçerli bir temel URL girin'
            },
            'pl': {
                'title': 'Konwerter adresu URL M3U dla IPTV',
                'privacy_notice': 'GWARANCJA PRYWATNOŚCI: NIC NIE JEST PRZECHOWYWANE NA NASZYCH SERWERACH LUB W INNYM MIEJSCU!',
                'how_to_use': 'Jak używać tego narzędzia:',
                'step1': 'Wprowadź podstawowy adres URL swojego dostawcy IPTV (na przykład: http://example.iptv.com:8080)',
                'step2': 'Wprowadź swoją nazwę użytkownika i hasło, które otrzymałeś od swojego dostawcy IPTV',
                'step3': 'Kliknij przycisk "Konwertuj", aby wygenerować link M3U',
                'step4': 'Skopiuj wygenerowany adres URL i użyj go w swoim odtwarzaczu IPTV (takim jak VLC, IPTV Player, Smart TV itp.)',
                'base_url_label': 'Podstawowy adres URL Twojego dostawcy IPTV:',
                'base_url_placeholder': 'Na przykład: http://example.iptv.com:8080',
                'username_label': 'Nazwa użytkownika:',
                'username_placeholder': 'Twoja nazwa użytkownika',
                'password_label': 'Hasło:',
                'password_placeholder': 'Twoje hasło',
                'convert_button': 'Konwertuj na link M3U',
                'success_message': 'Adres URL został pomyślnie skopiowany do schowka!',
                'result_ready': 'Twój adres URL M3U jest gotowy:',
                'copy_button': 'Kopiuj do schowka',
                'what_is_m3u': 'Co to jest adres URL M3U?',
                'm3u_explanation': 'Adres URL M3U to specjalny link używany przez odtwarzacze IPTV do dostępu do transmisji na żywo, filmów i innych treści od Twojego dostawcy IPTV.',
                'how_to_use_title': 'Jak używać:',
                'how_to_use_explanation': 'Po wygenerowaniu adresu URL możesz go użyć w dowolnym odtwarzaczu IPTV, takim jak:',
                'player_vlc': 'Odtwarzacz VLC Media Player (Media → Otwórz strumień sieciowy)',
                'player_apps': 'Aplikacje IPTV na smartfonach i tabletach',
                'player_smart_tv': 'Smart TV z obsługą IPTV',
                'player_android': 'Boxy Android TV',
                'player_other': 'Odtwarzacze IPTV takie jak IPTV Smarters, GSE IPTV itp.',
                'important': 'Ważne:',
                'privacy_guarantee': 'GWARANCJA PRYWATNOŚCI: To narzędzie NIC NIE PRZECHOWUJE - żadne informacje nie są przechowywane na naszych serwerach lub w innym miejscu. Wszystko działa całkowicie lokalnie w Twojej przeglądarce.',
                'data_usage': 'Twoje dane są używane wyłącznie do generowania adresu URL i nigdy nie opuszczają Twojego urządzenia. Nie ma bazy danych i nie są prowadzone żadne logi.',
                'credentials_warning': 'Przechowuj swoje dane logowania w bezpiecznym miejscu i nie dziel się nimi z innymi.',
                'validation_error': 'Wprowadź poprawny podstawowy adres URL'
            },
            'sv': {
                'title': 'M3U URL-omvandlare för IPTV',
                'privacy_notice': 'SEKRETESSGARANTI: INGET LAGRAS PÅ VÅRA SERVRAR ELLER NÅGON ANNANSTANS!',
                'how_to_use': 'Hur man använder det här verktyget:',
                'step1': 'Ange grund-URL:en för din IPTV-leverantör (till exempel: http://example.iptv.com:8080)',
                'step2': 'Fyll i ditt användarnamn och lösenord som du fick från din IPTV-leverantör',
                'step3': 'Klicka på knappen "Konvertera" för att skapa din M3U-länk',
                'step4': 'Kopiera den genererade URL:en och använd den i din IPTV-spelare (till exempel VLC, IPTV Player, Smart TV, etc.)',
                'base_url_label': 'Grund-URL för din IPTV-leverantör:',
                'base_url_placeholder': 'Till exempel: http://example.iptv.com:8080',
                'username_label': 'Användarnamn:',
                'username_placeholder': 'Ditt användarnamn',
                'password_label': 'Lösenord:',
                'password_placeholder': 'Ditt lösenord',
                'convert_button': 'Konvertera till M3U-länk',
                'success_message': 'URL:en kopierades framgångsrikt till urklipp!',
                'result_ready': 'Din M3U-URL är klar:',
                'copy_button': 'Kopiera till urklipp',
                'what_is_m3u': 'Vad är en M3U-URL?',
                'm3u_explanation': 'En M3U-URL är en speciell länk som används av IPTV-spelare för att få åtkomst till live-TV, filmer och annat innehåll från din IPTV-leverantör.',
                'how_to_use_title': 'Hur man använder:',
                'how_to_use_explanation': 'Efter att URL:en har genererats kan du använda den i vilken IPTV-spelare som helst, till exempel:',
                'player_vlc': 'VLC Media Player (Media → Öppna nätverksström)',
                'player_apps': 'IPTV-appar på smartphones eller surfplattor',
                'player_smart_tv': 'Smart-TV:ar med IPTV-stöd',
                'player_android': 'Android TV-boxar',
                'player_other': 'IPTV-spelare som IPTV Smarters, GSE IPTV, etc.',
                'important': 'Viktigt:',
                'privacy_guarantee': 'SEKRETESSGARANTI: Det här verktyget lagrar INGET - ingen information lagras på våra servrar eller någon annanstans. Allt fungerar helt lokalt i din egen webbläsare.',
                'data_usage': 'Dina uppgifter används endast för att generera URL:en och lämnar aldrig din enhet. Det finns ingen databas och inga loggar sparas.',
                'credentials_warning': 'Spara dina inloggningsuppgifter på ett säkert ställe och dela dem inte med andra.',
                'validation_error': 'Ange en giltig grund-URL'
            }
        };

        function changeLanguage() {
            const language = document.getElementById('languageSelect').value;
            const trans = translations[language];

            // Update text content of HTML elements
            document.getElementById('pageTitle').textContent = trans.title;
            document.getElementById('privacyText').textContent = trans.privacy_notice;
            document.getElementById('howToUseTitle').textContent = trans.how_to_use;
            document.getElementById('step1').textContent = trans.step1;
            document.getElementById('step2').textContent = trans.step2;
            document.getElementById('step3').textContent = trans.step3;
            document.getElementById('step4').textContent = trans.step4;
            document.getElementById('baseUrlLabel').textContent = trans.base_url_label;
            document.getElementById('baseUrl').placeholder = trans.base_url_placeholder;
            document.getElementById('usernameLabel').textContent = trans.username_label;
            document.getElementById('username').placeholder = trans.username_placeholder;
            document.getElementById('passwordLabel').textContent = trans.password_label;
            document.getElementById('password').placeholder = trans.password_placeholder;
            document.getElementById('convertButton').textContent = trans.convert_button;
            document.getElementById('successMessage').textContent = trans.success_message;
            document.getElementById('resultReady').textContent = trans.result_ready;
            document.getElementById('copyButton').textContent = trans.copy_button;
            document.getElementById('whatIsM3u').textContent = trans.what_is_m3u;
            document.getElementById('m3uExplanation').textContent = trans.m3u_explanation;
            document.getElementById('howToUse').textContent = trans.how_to_use_title;
            document.getElementById('howToUseExplanation').textContent = trans.how_to_use_explanation;
            document.getElementById('playerVlc').textContent = trans.player_vlc;
            document.getElementById('playerApps').textContent = trans.player_apps;
            document.getElementById('playerSmartTv').textContent = trans.player_smart_tv;
            document.getElementById('playerAndroid').textContent = trans.player_android;
            document.getElementById('playerOther').textContent = trans.player_other;
            document.getElementById('important').textContent = trans.important;
            document.getElementById('privacyGuarantee').innerHTML = trans.privacy_guarantee;
            document.getElementById('dataUsage').textContent = trans.data_usage;
            document.getElementById('credentialsWarning').textContent = trans.credentials_warning;
        }

        function convertUrl() {
            const baseUrl = document.getElementById('baseUrl').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!baseUrl || !username || !password) {
                alert(translations[document.getElementById('languageSelect').value].validation_error);
                return;
            }

            const convertedUrl = `${baseUrl}/get.php?username=${username}&password=${password}&type=m3u_plus&output=ts`;
            document.getElementById('convertedUrl').textContent = convertedUrl;
            document.getElementById('result').style.display = 'block';
        }

        function copyToClipboard() {
            const copyText = document.getElementById('convertedUrl').textContent;
            navigator.clipboard.writeText(copyText).then(() => {
                const successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            });
        }
		    
			// Dark mode toggle
            document.getElementById('darkModeToggle').addEventListener('change', function() {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
