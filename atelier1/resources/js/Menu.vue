<template>
 <!-- Nav bar -->
 <nav class="navbar navbar-dark bg-dark justify-content-between flex-nowrap flex-row">
 <div class="container">
 <a class="navbar-brand pr-3 float-left">Projet</a>
 <ul class="nav navbar-nav flex-row float-right">
 <li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/"> Home </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/categories"> Catégories </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/addCategorie"> Ajout Catégorie </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/scategories"> Sous Catégories </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/addScategories"> Ajout Sous catégories </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/articles"> Articles </router-link></li>
<li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/addArticle">
Ajout Article </router-link></li>

<a class="navbar-brand float-left">
<li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3" to="/register">
 Authentification
 </router-link></li>
 <li class="nav-item">
 <router-link class="nav-link" to="/logout"> Logout </router-link></li>
 </a>
 </ul>
 </div>
 </nav>
</template>

<script>
 export default {}
</script>
