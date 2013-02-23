/* La requette renvoie tout les lieux entre les
   coordonnées entré en paramètre (ici ce sont les chiffres) */
SELECT nom FROM lieu where lat BETWEEN 30 AND 45 AND lng BETWEEN 3 AND 7;

