# Projet Leblog de Batman

## Installation

###Cloner le projet

```
git clone https://github.com/MF21rsk4/leblogdebatman.git
```


### Modifier les paramètres d'environnement dans le fichier .env (changer user_db et password_db)

###Deplacer le terminal dans le dossier cloné

```
cd leblogdebatman
```

### Taper les commandes suivantes:

```
composer install
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migration:migrate
```