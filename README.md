# Zwii 9

Zwii est un CMS sans base de données (Flat-File) qui permet à ses utilisateurs de créer et gérer facilement un site web sans aucune connaissance en programmation.

[Site](http://zwiicms.com/) - [Forum](http://forum.zwiicms.com/) - [GitHub version initiale](https://github.com/remijean/ZwiiCMS/) - [GitHub](https://github.com/fredtempez/ZwiiCMS)

Zwii a été créé par un développeur de talent, [Rémi Jean](https://remijean.fr/), il est désormais maintenu par la communauté et hébergé sur ce git.


## Configuration recommandée

* PHP 5.6 ou plus
* Support du .htaccess

## Installation

Décompressez l'archive de Zwii sur votre serveur et c'est tout !


## Procédure de mise à jour de Zwii

### Mise à jour automatique

* Connectez vous à votre site,
* Allez dans l'interface d'administration,
* Si une mise à jour est disponible, elle vous est proposée,
* Cliquez sur le bouton "Mettre à jour".

### Mise à jour manuelle

**Note : La réécriture d'URL est automatiquement désactivée après une mise à jour manuelle. À vous de la réactiver depuis l'interface de configuration du site.**

* Sauvegardez l'intégralité du dossier ZwiiCMS de votre serveur et notamment le dossier 'site',
* Décompressez la nouvelle version sur votre ordinateur dans un autre dossier,
* Supprimez le dossier 'site' de la version décompressée
* Transférez la nouvelle version sans le dossier 'site'

En cas de difficulté avec la nouvelle version, il suffira de téléverser la sauvegarde originale.

### Mise à jour de la version 8 vers la version 9

Les données du site dans 'site/data' sont désormais stockées dans deux fichiers : core.json et theme.json

Après la copie des fichiers ces deux fichiers sont créés à partir du data.json de la version 8, ce fichier est ensuite renommée en data_imported.json

En cas de retour à une version 8, ce fichier devra être renommé en data.json

## Arborescence générale

*Légende : [D] Dossier ; [F] Fichier*

```text
[D] core                   Contient le coeur de Zwii
  [D] layout               Contient les différentes structure de thème
  [D] module               Contient les modules du coeur
  [D] vendor               Contient les librairies
  [F] core.js.php          Coeur JavaScript de Zwii
  [F] core.php             Coeur PHP de Zwii
[D] module                 Contient les modules de page
[D] site                   Contient les données du site
  [D] backup               Contient les 30 dernière sauvegardes automatiques du fichier data.json
  [D] data                 Contient les fichiers de données
    [F] core.json          Fichier de données
    [F] theme.json         Fichier du thème
    [F] custom.css         Feuille de style de la personnalisation avancée
    [F] theme.css          Thème stocké dans le fichier data.json compilé en CSS
  [D] file                 Contient les fichiers envoyés sur le serveur depuis le gestionnaire de fichiers
    [D] source             Contient les fichiers
    [D] thumb              Contient les miniatures des fichiers de type image
  [D] tmp                  Contient les fichiers temporaire
[F] index.php              Fichier d'initialisation de Zwii
```
