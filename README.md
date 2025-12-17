# 🍽️ FOO-LINK - Plateforme de Partage de Recettes

<div align="center">

![PHP](https://img.shields.io/badge/PHP-8.2.12-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![Tailwind](https://img.shields.io/badge/Tailwind-3.0-38B2AC?style=for-the-badge&logo=tailwind-css)

**Plateforme communautaire pour découvrir, partager et commenter des recettes du monde entier**

[🚀 Installation](#-installation) • [📖 Documentation](#-documentation) • [🎓 Apprendre](#-apprendre-le-backend)

</div>

---

## ✨ **Fonctionnalités**

### 👥 **Pour tous les visiteurs**
- 🔍 Recherche de recettes par mot-clé
- 📊 Statistiques : recettes populaires, top contributeurs
- 💬 Lecture des commentaires et avis

### 🔐 **Pour les utilisateurs connectés**
- ✍️ Création et modification de recettes
- ❤️ Système de likes
- 💬 Commentaires sur les recettes
- 📊 Tableau de bord personnel
- 👤 Gestion du profil

### 🛡️ **Pour les administrateurs**
- 📁 Gestion des catégories
- 🗑️ Modération des commentaires
- 📊 Statistiques avancées

---

## 🚀 **Installation**

### **Prérequis**
- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)
- Navigateur web moderne

### **Étapes d'installation**

1. **Cloner le projet**
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/rayague/foo-link.git
   ```

2. **Créer la base de données**
   - Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
   - Créer une base `foo_link`
   - Importer le fichier : `database_schema.sql`

3. **Configurer la connexion**
   - Les fichiers sont déjà configurés pour XAMPP par défaut
   - Si besoin, modifier : `config/config.php`

4. **Démarrer le serveur**
   - Lancer XAMPP Control Panel
   - Démarrer Apache et MySQL
   - Visiter : `http://localhost/foo-link`

---

## 📁 **Structure du projet**

```
foo-link/
│
├── 📂 models/              # Classes qui communiquent avec MySQL
│   ├── Database.php        # Connexion à la base de données
│   ├── User.php            # Gestion des utilisateurs
│   ├── Recette.php         # Gestion des recettes
│   ├── Like.php            # Système de likes
│   └── Commentaire.php     # Système de commentaires
│
├── 📂 controllers/         # Logique métier (cerveau de l'app)
│   ├── ConnexionController.php
│   ├── RecetteController.php
│   ├── LikeController.php
│   └── CommentaireController.php
│
├── 📂 views/               # Pages HTML affichées
│   ├── connexion.php
│   ├── inscription.php
│   ├── recettes.php
│   ├── recette.php
│   │
│   ├── 📂 partials/        # Éléments réutilisables
│   │   ├── navbar.php
│   │   ├── footer.php
│   │   └── head.php
│   │
│   └── 📂 dashboard/       # Pages du tableau de bord
│       ├── index.php
│       ├── recettes.php
│       └── profil.php
│
├── 📂 assets/              # Fichiers statiques
│   ├── css/
│   ├── images/
│   └── scripts/
│
├── 📂 helpers/             # Fonctions utilitaires
│   └── csrf.php            # Protection CSRF
│
├── 📄 index.php            # Page d'accueil
├── 📄 database_schema.sql  # Schéma de la base de données
│
└── 📚 Documentation/
    ├── GUIDE_BACKEND.md       # 🎓 Comprendre le backend
    ├── EXEMPLES_PRATIQUES.md  # 💡 Exemples de code expliqués
    └── GLOSSAIRE.md           # 📖 Termes techniques
```

---

## 📖 **Documentation**

### **Pour développeurs débutants**

Vous ne comprenez pas le code backend ? **Pas de panique !** 🎓

Nous avons créé 3 guides complets pour vous :

#### 1️⃣ **[GUIDE_BACKEND.md](GUIDE_BACKEND.md)** - Comprendre l'architecture
- Comment fonctionne le backend ?
- Qu'est-ce que MVC ?
- Rôle des Models, Controllers, Views
- Flux de données expliqué pas à pas

#### 2️⃣ **[EXEMPLES_PRATIQUES.md](EXEMPLES_PRATIQUES.md)** - Apprendre par l'exemple
- 6 exemples concrets et détaillés
- Chaque ligne de code est expliquée
- Exercices pratiques pour s'entraîner
- Astuces de débogage

#### 3️⃣ **[GLOSSAIRE.md](GLOSSAIRE.md)** - Dictionnaire des termes
- Tous les termes techniques expliqués simplement
- Symboles PHP décryptés
- Commandes SQL courantes

### **Code commenté**
Tous les fichiers du backend contiennent maintenant des commentaires détaillés :
- [models/Database.php](models/Database.php) - Connexion MySQL expliquée
- [models/Recette.php](models/Recette.php) - CRUD avec documentation
- [controllers/RecetteController.php](controllers/RecetteController.php) - Routage expliqué

---

## 🎓 **Apprendre le Backend**

### **Parcours recommandé pour débutants**

```
1. 📖 Lire GLOSSAIRE.md
   → Comprendre les termes de base
   
2. 📚 Lire GUIDE_BACKEND.md  
   → Comprendre l'architecture MVC
   
3. 💡 Lire EXEMPLES_PRATIQUES.md
   → Voir le code en action
   
4. 🔍 Explorer les fichiers commentés
   → models/Database.php
   → models/Recette.php
   → controllers/RecetteController.php
   
5. 🛠️ Faire les exercices
   → Modifier une fonction
   → Ajouter un champ
   → Créer une page
```

---

## 🛡️ **Sécurité**

Le projet implémente les bonnes pratiques de sécurité :

✅ **Protection SQL Injection** - Requêtes préparées (PDO)
✅ **Protection XSS** - `htmlspecialchars()` sur toutes les sorties
✅ **Protection CSRF** - Tokens sur les formulaires
✅ **Mots de passe cryptés** - `password_hash()` / `password_verify()`
✅ **Sessions sécurisées** - Vérifications à chaque page protégée

---

## 🔧 **Technologies utilisées**

| Technologie | Utilisation |
|-------------|-------------|
| **PHP 8.2** | Logique backend |
| **MySQL 8.0** | Base de données |
| **PDO** | Connexion sécurisée à MySQL |
| **Tailwind CSS** | Design responsive |
| **JavaScript** | Interactions dynamiques |

---

## 📊 **Base de données**

### **Tables principales**

**users** - Utilisateurs
```sql
id, firstname, lastname, email, password, role, created_at
```

**recettes** - Recettes
```sql
id, titre, description, categorie_id, user_id, vues, created_at
```

**likes** - J'aime
```sql
id, recette_id, user_id, created_at
```

**commentaires** - Commentaires
```sql
id, contenu, recette_id, user_id, created_at
```

**categories** - Catégories
```sql
id, nom
```

---

## 🚦 **Tester le projet**

### **1. Créer un compte**
- Aller sur : `http://localhost/foo-link/inscription.php`
- Remplir le formulaire
- Se connecter

### **2. Créer une recette**
- Aller dans le tableau de bord
- Cliquer sur "Mes recettes"
- Ajouter une nouvelle recette

### **3. Interagir**
- Liker des recettes
- Commenter
- Rechercher

---

## 🐛 **Débogage**

### **Problème : Page blanche**
1. Vérifier que Apache et MySQL sont démarrés dans XAMPP
2. Vérifier les logs Apache : `C:\xampp\apache\logs\error.log`
3. Activer l'affichage des erreurs en haut du fichier :
   ```php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```

### **Problème : Erreur de connexion MySQL**
1. Vérifier que MySQL est démarré
2. Vérifier les identifiants dans `models/Database.php` :
   ```php
   "mysql:host=localhost;dbname=foo_link;charset=utf8"
   "root"  // utilisateur
   ""      // mot de passe (vide sur XAMPP)
   ```

### **Problème : Session non persistante**
1. Vérifier que `session_start()` est appelé
2. Vérifier les permissions du dossier : `C:\xampp\tmp`

---

## 🤝 **Contribuer**

Les contributions sont les bienvenues !

1. Fork le projet
2. Créer une branche : `git checkout -b feature/ma-fonctionnalite`
3. Commit : `git commit -m "Ajout de ma fonctionnalité"`
4. Push : `git push origin feature/ma-fonctionnalite`
5. Créer une Pull Request

---

## 📝 **TODO / Améliorations futures**

- [ ] Upload d'images pour les recettes
- [ ] Système de notation (étoiles)
- [ ] Filtres avancés (temps de préparation, difficulté)
- [ ] Export PDF des recettes
- [ ] Mode sombre
- [ ] API REST complète
- [ ] Tests automatisés

---

## 📄 **Licence**

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

## 👨‍💻 **Auteur**

**rayague**
- GitHub : [@rayague](https://github.com/rayague)
- Projet : [foo-link](https://github.com/rayague/foo-link)

---

## 🙏 **Remerciements**

- Tailwind CSS pour le framework CSS
- XAMPP pour l'environnement de développement
- La communauté PHP pour les bonnes pratiques

---

<div align="center">

**⭐ Si ce projet vous aide, n'hésitez pas à lui donner une étoile !**

Made with ❤️ and 🍕

</div>
