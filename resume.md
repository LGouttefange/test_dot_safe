# Compte rendu


## Ce qui s'est (mal) passé 

Dans un premier temps, en lisant l'énoncé, rien ne m'a semblé difficile car j'ai déjà implémenté toutes ces features au moins une fois dans des expériences passées. 😎

Malheureusement en me sentant confiant à la seconde lecture et voulant donner mon maximum en m'applicant j'ai décidé de découper en plusieurs classes enfants comme évoqué dans l'énoncé :
_"idéalement si on a le temps, on aimerait une classe par type de todo"_. 🫡

Je n'aurais pas dû, je n'ai jamais utilisé cette ce pattern de **superClass** avec API Platform mais je l'avais envisagé lors de mon précédent emploi, à la difference de ça devait être plusieurs table enfants ('JOINED'). Je fonce pour essayer de l'implementer mais ça me fait perdre du temps mais je pense que ça reste une bonne idée. 🧐

Oui ça l'aurait été si ça avait fonctionné et que cela ne m'avait pas dès lors commencé à me faire paniquer. 

J'écris le code du split des classes qui allait potentiellement fonctionner plus tard (le getAll sur postman ne fonctionnait alors plus...), j'ai décidé de regarder la partie front... et là, le constat est sans appel :
- j'ai pas bossé sur un crud en front depuis un bout de temps et
- j'ai jamais écrit une ligne de Vue 😅

C'est là que je me suis dis qu'en fait c'est plus chaud que je le pensais... et vient le dilemne "non mais je vais quand même y arriver, je reste sur la première idée, "ça vaut le coup". 

Ainsi je fais des allé/retour front/back, je relis l'énoncer.  
J'essai d'implementer "_les nouvelles règles sont encore absentes_" :
- workflow ,ça colle pas, 
- Doctrine events (eventSubscriber)?, ok, de toute façon faut que je speed

J'essai de le brancher, je perds du temps, ça fonctionne pas, je post un Todo avec postman, le dump s'affiche pas, j'essaie de le forcer dans services.yaml, rien à faire, tant pis, next 🙁

Je me décide enfin à attaquer le front, j'ai mis 15 minutes à faire fonctionner l'affichage conditionnel dans le form du add, pour voir que c'est même pas demandé, je commence à transpirer. 

J'ai ensuite reussi à faire fonctioner le toggle "pour compléter une TODO en un clic". Comme mon back fonctionnait plus, j'ai rollback sur ce qui fonctionnait, l'état initial de l'API en fait ... 😅 du coup ça fonctionne

J'ai donc reussi à faire _ajouter un bouton pour compléter une TODO en un clic_ 🥳
Le reste de ce que j'ai ecrit ne fonctionne pas ou est non demandé. J'ai très vite fait amélioré l'affichage mais pas suffisamment. 

Je décide de m'arreter peu de temps après en me disant que le test est de 3h max et que ça ne servira à rien d'aller plus loin en dépassant. Ce n'est pas la consigne. 

## Ce que j'aurais dû faire :

- Lire l'énoncé puis regarder tout le code et pas seulement celui de la partie API. Ça m'aurait fait réaliser que le front c'est pas si simple surtout sur un framwork inconnu, et que c'était ça le vrai challenge pour quelqu'un qui en a pas fait depuis des lustre. 
- Pas m'embêter avec le split en sous classe, j'aurais eu un back fonctionnel tout le temps pour implementer les features du front. 
- Puis celles du back que je sais faire

## Ce que j'ai pas fait mais que je sais faire et comment : 

- _ajouter un filtre pour afficher uniquement les TODO complétées_  
  __Pour ça j'aurais utilisé le APIFilter natif d'API Platform simple efficace, sur la propriété completed, l'implémenter coté front avec un petit toogle comme j'ai fait pour les completer, le seul truc qui fonctionne.__

- _ajouter une route API pour récupérer des informations sur l'ensemble des todos ([nombre de todos complétés] / [Nombre de todos total])_  
__Je pense que j'aurais fait un controller à part avec un appel sur le repository et deux méthodes qui count(), puis JsonReturn(), etc__ 

- _ajouter de la validation côté API_  
  Des asserts natif API Platform auraient fait le job.

- _ajouter un formulaire de modification de TODO_  
  Sans connaitre vue, je l'aurais fait en dernier, en lisant la doc, j'aurais reussi.

## Outils utilisés 

  - je n'ai pas utilisé ChatGPT ni aucune autre AI mis à part pour lui demaner d'écrire la classe de test unitaires de l'entité Todo.php.
  - Postman pour tester les endpoints API sans passer par le front.
