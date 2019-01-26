# ChangeLog 

## Préversion 9.0.0
- Modification :
    - Stockage distinct du thème et des autres données (core, config, page, module et users ) avec import des données d'une version 8
    - gestion des thèmes :
        - Exporter un thème (avec les images) sous forme d'une archive ZIP à télécharger ou stocker dans  Fichiers.
        - Importer un thème à partir des fichiers
    - Option de position fixe du menu type Facebook        
    - Gabarits de pages : deux barres latérales, une à droite ou à gauche contenant des informations fixes.
    - Changement du libellé Modérateur devient Editeur 
    - Editeur :     
        - VisualBlocks dans TinyMCE
        - CodeMirror dans TinyMCE
    - Mini barre pour les membres simples
    - Update : affichage de la version proposée dans la popup de mise à jour
    - Module Formulaire :
            - Case à cocher dans les formulaires
            - Bouton d'export au format CSV
            - Bouton effacer toutes les données
            - Correction faille CSRF dans Data
Correctif : 
    - contrôle CSRF de la configuration du compte connecté
    - Problème dans data/.htaccess
    - Erreur dans la procédure d'update suite à un ancien numéro de versions sur 4 digits
    - suppression des barres latérales dans les pages de configuration des modules
Mise à jour : 
    - TinyColoPicker

     
## Version 8.5.6
* Correction : 
    - Destruction de la session au logout
    - Thème : aperçu de la modification de la barre de menu au-dessus du site
* Modification : 
    - Mise à jour RFM 9.14
    - Amélioration de la contre mesure CRSF
    - Libellé dans TinyMCE (gabarit)
    - Setlocal modification des paramètres FR    

## Version 8.5.5
* Correction : 
    - Faille CSRF lors de l'effacement d'un membre
    - Faille CSRF lors de l'effacement d'une galerie
    - Faille CSRF lors de l'effacement d'un article de blog    
    - Faille CSRF lors de l'effacement d'un article de news
    - Taille de la police dans le footer impossible à modifier

## Version 8.5.4
* Correction : 
    - Faille CSRF lors de l'effacement d'une page

## Verison 8.5.3
* Modification :
    - Config bouton de génération de la capture de l'écran OpenGraph
* Correction :
    - Appel de la génération de la capture d'écran OpenGraph quand le fichier est absent
    - CSS pour le footer des blocs et non des éléments
        - \#footersite, \#footerbody : bloc footer dans et hors site
        - \#footersite, \#footerbody a : liens du bloc footer  dans et hors site
        - Bloc des colonnes dans et hors site :
            - \#footersiteLeft, \#footerbodyLef
            - \#footersiteCenter, \#footerbodyCenter
            - \#footersiteRight, \#footerbodyRight   


## Verison 8.5.2
* Correction : 
    - Thème menu : aperçu quand le menu est au-dessus et en-dehors du site
    
## Version 8.5.1
* Correction :
    - Nom de variable incorrect

## Version 8.5.0
* Correction : 
    - Suppression popup active par défaut dans le menu
    - Suppression option de titre de page dans le menu Icone + Texte
* Modification : 
    - Thème du menu : sélection de la police de caractère

## Version 8.4.9
* Correction :
    - Adresse d'une page inactive
* Modification : 
    - Blog : masquer une image dans l'article tout en conservant la miniature dans l'index

## version 8.4.8 
* Correction : 
    - Fautes de frappe

## Version 8.4.7
* correction :
    - Chaine de mise à jour des variables internes 

## Version 8.4.6
* corrections : 
    - Encodage des dates dans la liste des articles news et blog
    - Variable itemsperPage stockée dans le mauvais type

## Version 8.4.5
* corrections :
    - nettoyage du code core.php
    - W3C ajout de balise title manquante
    - Inversion de deux balises dans Socials

## Version 8.4.4
* Correction : 
    - Valeur par défaut et d'update des éléments du footer dans les blocks 

## Version 8.4.3
* Correction : 
    - URL incorrecte dans Metaimage
    - Erreur dans la génération du sitemap
    - Taille du texte de la bannnière maximale relative (vmax)
    - Préfixe des en-têtes html pour OpenGraph
    - Balise Titre dans Socials
    - Conformité W3C des URL dans socials

## Version 8.4.2
* Correction :
    - Modifications de la présentation des en-têtes d'articles de Blog et de News
    - Format du mois au format long et en français

## Version 8.4.1
* Correction :
    - Erreur de type empêchant l'affichage des articles du blog (nombre d'articles par page)

## Version 8.4.0
* Modifications :
	- Footer dans 3 blocs contenant dans l'ordre : Texte, Réseaux sociaux, Copyright
	- Pagination variable du nombres d'articles par page (news, blog et form)
	- Position des modules Galerie et Form dans une page ; haut ; bas ou libre avec les doubles crochets insérés dans l'article []
    - Prise en compte des balises OpenGraph obligatoires title , description, type et images
    - Modification de la position des boutons retour et éditer lors de l'affichage d'un article si connecté
    - Mise en forme de la composition des articles et des news 
    - Suppression du message de l'édition des redirections

* Corrections : 
    - Accès aux pages désactivées par le sitemap
    - Réduction du temps d'affichage des notifications
    - Image responsive en en-tête de l'article d'un blog
    - Mise à jour du gestionnaire de fichiers en version 9.13.1

## version 8.3.13 :
* Modifications : 
    - Bannière "responsive", nouvelles options de positionnement
    - Bouton Edit dans Blog
    - Options de position des menus selon la position de la bannière
    - Bouton Edition dans un article du blog
    - Balise ALT dans les images du menu
    - Correction RFM
 

## version 8.3.12 :
* Modification : 
    - bouton de retour dans la page d'un article de blog
* Correction :
    - miniatures des exemples 
## version 8.3.11 :
* Modifications : 
    - Thème : menu et sous menu sous forme de texte ou d'image (avec ou sans bulle)
    - Thème : nouvelle option permettant de cliquer sur la bannière afin de revenir à la racine du site
    - Thème : le menu peut être positionné en haut et hors de site sur la largeur de l'écran
    - Page : nouvelle option permettant désactiver une page dans le menu. Cette option permet soit  de mettre une page en maintenance tout en la laissant active dans le menu, soit de créer une entrée de menu principal sans contenu 
    - nouvelle option :  la bannière devient cliquable et renvoie vers la page d'accueil
    - nom des dossiers des images exemples
* Corrections : 
    - bug des commentaires non déposés quand connecté
    - bug présent depuis au moins la version 8.1 et qui faisait boucler l'édition d'une page avec un module de redirection; Après édition, un clic sur retour ou enregistrer renvoie vers la  page d'accueil en édition.
    - affichage d'une erreur 404 si le contenu d'une page est supprimé
    - erreur deans le filemanger si une seule extension demandée
    - corrige les droits sur la rédaction des commentaires
    - nouvelles icones d'exemple pour les menus
## 8.2.9
* Correction  :  filemanger : erreur dans la navigation du filemanager dans la sélection de la favicon
* Modification : on peut effacer le contenu d'une page sans provoquer d'erreur 404 
## 8.2.8
* Correction : filemanager problème de lecture d'une seule extension
## 8.2.7
* Correction : gestion des droits sur les commentaires du blog
* Correction : une option en double dans TinyMCE
## 8.2.6
* Ajout : module codesample dans TinyMCE
* Correction : erreur pendant de la récupération des données lorsque plusieurs cases à cocher ne sont pas cochées
* Correction : désactivation automatique de la réécriture d'URL lors de l'enregistrement de la configuration du site
* Correction : iframes et vidéos responsives
* Correction : lien de réinitialisation du mot de passe incorrect
* Correction : backup automatique non fonctionnel
* Correction : mauvaise lightbox de confirmation de suppression d'un utilisateur
* Correction : message de modifications non enregistrées lors de la navigation dans le module galerie
* Correction : aperçu incorrect de certaines polices dans la personnalisation du thème
* Correction : légende toujours visible dans le module galerie même lorsqu'elle est vide
* Correction : impossible de modifier un lien ou un tableau dans TinyMCE
* Correction : champ de sélection de date non fonctionnel
* Correction : images non triées par ordre alphabétique dans le module galerie
* Correction : articles après la première page du module blog non accessibles
* Correction : non suppression des données du module rattaché à une page lors de sa suppression
* Mise à jour : TinyMCE en 4.7.9

## 8.2.5
* Ajout : message de confirmation avant la mise à jour
* Ajout : sauvegarde du fichier de données avant une mise à jour
* Ajout : copier / coller avec un clic droit dans TinyMCE
* Ajout : plugin stickytoolbar afin de fixer la barre d'outils dans TinyMCE lors du défilement de la page
* Amélioration : modification du message d'erreur lors d'une mise à jour
* Amélioration : nouveaux textes par défaut à l'installation
* Correction : message de confirmation avant de quitter une page sans enregistrer ne s'affiche pas
* Correction : suppression du plugin legacyoutput qui génère du vieux code à la place du HTML5 dans TinyMCE
* Correction : message d'erreur lors d'une mise à jour avec la réécriture d'URL activée

## 8.2.4
* Ajout : bouton de mise à jour dans la barre utilisateur
* Ajout : mode mobile pour TinyMCE
* Amélioration : rétablissement de la réécriture d'URL après une mise à jour
* Amélioration : affichage des différentes étapes de mise à jour
* Correction : résultat d'une recherche caché par l'overlay de TinyMCE
* Correction : suppression des commentaires d'un article lors du changement de titre
* Mise à jour : TinyMCE en 4.7.8

## 8.2.3
* Ajout : mise à jour automatique de Zwii
* Ajout : surcouche de TinyMCE aux couleurs de Zwii
* Ajout : module pour rétablir le contenu non enregistré dans TinyMCE
* Correction : divers bugs mineurs

## 8.2.2
* Ajout : options avancées des images dans TinyMCE
* Ajout : effet de transition au survol des galeries photos
* Ajout : mode maintenance activable depuis la page de configuration
* Ajout : bordure autour de l'éditeur CSS dans la personnalisation avancée
* Amélioration : optimisation du message de consentement pour les cookies
* Correction : affichage cassé lors de l'ajout d'une image en fin d'article ou news
* Correction : incohérence dans la petite largeur du site
* Correction : erreur dans le script de mise à jour 8.2.0
* Correction : vidéos reponsives non fonctionnelles
* Correction : légendes des photos de la galerie invisibles
* Mise à jour : Simplelightbox version 1.11.1

## 8.2.1
* Correction : texte des boutons et des items du menu invisible

## 8.2.0
* Ajout : bouton pour fermer les notifications
* Ajout : barre de progression dans les notifications
* Ajout : flèche pour les items du menu avec sous-menus
* Ajout : personnalisation avancée
* Ajout : nouveaux options de personnalisation
* Ajout : nouvelles tooltips
* Ajout : vidéos et iframes responsives
* Ajout : plugin template afin de créer des colonnes adaptatives dans TinyMCE
* Correction : divers correctifs mineurs
* Mise à jour : Flatpickr version 4.3.2
* Mise à jour : jQuery version 3.3.1
* Mise à jour : Lity version 2.3.0
* Mise à jour : Normalize version 8.0.0
* Mise à jour : TinyMCE version 4.7.7
* Suppression : support multilingue

## 8.1.2
* Correction : popup d'édition du module de redirection visible pour les membres
* Correction : enregistrement des ids et des urls impossible avec des caractères spéciaux
* Mise à jour : ResponsiveFilemanager version 9.12.2

## 8.1.1
* Amélioration : nouvelle méthode de traduction
* Correction : faille de sécurité
* Correction : faute d'orthographe
* Correction : news non publiée lors de la création
* Correction : pas de pagination pour les modules blog et news
* Correction : nombre de caractères max des textareas du générateur de formulaires bloqué à 500
* Correction : impossible d'ajouter un slash dans le titre d'une page

## 8.1.0
* Ajout : message d'erreur en cas d'échec lors d'un envoi d'email
* Ajout : vérification du fichier de données afin d'éviter une corruption
* Ajout : édition des métas des pages
* Ajout : confirmation des lightboxs avec le bouton "Entrée"
* Ajout : suppression des données dans le générateur de formulaires
* Ajout : module blog
* Ajout : module news
* Amélioration : refonte de l'interface
* Amélioration : messages en cas d'absence de contenu dans la galerie et le générateur de formulaires
* Amélioration : optimisation des filtres afin de sécuriser davantage les données enregistrées
* Correction : "Champ obligatoire" dans le module de génération de formulaire invisible
* Correction : changer le titre d'une page supprime le module rattaché
* Correction : impossible de désactiver la sauvegarde automatique des données
* Correction : faille de sécurité au niveau des champs obligatoires

## 8.0.1
* Ajout : mot de passe dans l'email d'installation
* Ajout : redirection vers l'interface de connexion si la page d'accueil est privée
* Ajout : suppression automatique des backups de plus de 30 jours
* Amélioration : suppression de la balise h1 du haut de page afin d'optimiser le référencement des sites
* Correction : mauvais comportement avec les images flottante en fin de page (image coupée)
* Correction : le serveur utilise une adresse email incorrecte pour envoyer des emails (www. en trop)
* Correction : les pages parents cachées s'affichent dans le menu lorsqu'un enfant n'est pas caché
* Correction : bouton de mise à jour toujours visible avec certaines configurations de PHP
* Correction : titre du site toujours visible même lorsqu'il doit être masqué
* Correction : page courante non mise en avant dans le menu lors de son édition
* Correction : texte personnalisé du bouton dans le module formulaire non visible
* Correction : incohérence de casse entre l'identifiant saisi à l'inscription / création de compte et celui envoyé par email
* Mise à jour : jQuery version 3.2.0
* Mise à jour : PHPMailer version 5.5.23
* Mise à jour : ResponsiveFilemanager version 9.11.3

## 8.0.0
Nouvelle version majeure de Zwii.

