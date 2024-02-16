## Préambule

Le but de l'exercice est de manipuler API Platform & Nuxt sur la base d'un socle simple.  
Il est recommandé de ne pas y passer plus de deux ou trois heures, et de rendre tel quel une fois le délai atteint.

### Vous trouverez dans ce repository 
* les sources de l'exercice : 
  * un Symfony 6.3 API Platform
  * un front en Nuxt avec [Nuxt Ui](https://ui.nuxt.com/) & [Nuxt UI Pro](https://ui.nuxt.com/pro/getting-started)
  * un eslint préconfiguré pour Nuxt, vue, tailwind




## Installation:

#### Avec docker
Un Dockerfile ainsi qu'un fichier Docker Compose sont mis à disposition, avec de quoi lancer le projet


⚠️ Pré-requis:
* Docker, Docker compose

```shell
make start # or the command lines specified inside the Makefile
# front is accessible at http://localhost:3000
# api is accessible at http://localhost

# après lancement
make api # exec the api container
make front  # exec the front container

```

### Etat des lieux
* une petite TODO list a été créée avec Symfony API Platform, avec un front nuxt
* initialement, les TODOs sont complétées avec un Oui/Non dans la BDD
* une évolution est en cours pour avoir plusieurs types de TODOs
  * certaines peuvent être complétées grâce à un simple boolean oui/non
  * certaines sont complétées dès qu'une date limite est dépassée
  * certaines ont un pourcentage de progression, et sont complètes quand ce pourcentage est à 100%
* cependant cette règle n'est pas encore complète
  * les champs ont été ajoutés sur l'entité Todo
  * **mais les nouvelles règles sont encore absentes**


### Pour le rendre plus utilisable, il faudrait...
* implémenter les règles de complétion par type de TODO et afficher l'info en front
  * idéalement si on a le temps, on aimerait une classe par type de todo
* ajouter un bouton pour compléter une TODO en un clic
* ajouter un bouton pour supprimer une TODO
* améliorer un peu l'affichage de la liste (format de date, etc.)


### Et si on veut aller plus loin... (tâches bonus optionnelles)
* ajouter un filtre pour afficher uniquement les TODO complétées
* ajouter un formulaire de modification de TODO
* ajouter une route API pour récupérer des informations sur l'ensemble des todos (`[nombre de todos complétés] / [Nombre de todos total]`)
* ajouter de la validation côté API


##  ⚠️ Livrables attendus
les sources du projet terminé sous forme d'archive zip ou d'un lien vers un repository git  
un compte rendu sommaire (**maximum 1 page**):
* du temps passé dessus
* les tâches effectuées
* les tâches non effectuées, et pourquoi. S'il y avait une solution que vous n'avez pas eu le temps d'implémenter, hésitez pas à le mentionner
* éventuellement, des problèmes rencontrés ou des questions
* si possible la liste des ressources utilisées (vidéos, Chat GPT, etc.), à titre purement informatif ;) 


N’hésitez pas à revenir vers nous si vous repérez des coquilles.
Bon courage !
