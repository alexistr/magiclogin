# MagicLogin

Ce plugin permet le login rapide via un r�seau social (Twitter, Facebook, Persona) en guise de SSO.
Pour l'utiliser, il faut une page `spip.php?page=signup` qui contient `#FORMULAIRE_SIGNUP{6forum,#ENV{redirect}}` (si vous voulez que les nouveaux inscrits aient un statut 6forum par d�faut).
Si l'inscription est interdite sur le site, le formulaire ne permettra pas la cr�ation de compte, mais il permet d'associer un compte social avec un auteur existant lors de la premi�re utilisation du compte social.

## Parcours utilisateur

Sur le formulaire de login de SPIP, le plugin ajoute une mention "Se connecter avec" et les liens de connexion via les r�seaux sociaux activ�s et configur�s.
Lorsque l'utilisateur utilise un de ces boutons pour se connecter :

- la 1�re fois il est redirig� vers la page `signup` pour indiquer son pseudo et son email.
  - Si c'est un email qui n'est pas en base et que l'inscription est autoris�e on l'inscrit et on le connecte imm�diatement, et le compte social est associ� � son compte auteur SPIP ;
  - Si c'est un email d�j� en base on lui envoie un email avec un lien pour v�rifier son identit�. Quand il clic sur le lien, on associe le compte social avec son compte auteur SPIP et on le connecte.
- les fois suivantes, on reconnait le compte social et l'auteur SPIP associ� et on le connecte imm�diatement

Lorsque l'utilisateur utilise un compte social sur lequel il est d�j� logu�, il �vite ainsi toute saisie de mot de passe pour s'identifier � son site SPIP.

## Requis techniques

Pour permettre la connexion avec Twitter, le plugin n�cessite le plugin Twitter configur� (qui a donc un acc�s � l'API Twitter via une Application Twitter).

Pour permettre la connexion avec Facebook, il faut cr�er une application Facebook d�di�e au site concern� et indiquer les cl�s d'acc�s � l'Application dans la configuration du Plugin

Pour la connexion avec Persona il n'y a pas de pr�-requis technique.