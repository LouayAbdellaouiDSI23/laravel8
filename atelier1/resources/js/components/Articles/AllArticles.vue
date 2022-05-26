<template>
 <div>
 <h2 class="text-center">Liste des Articles </h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Référence</th>
 <th>Désignation</th>
 <th>Marque</th>
 <th>Prix Achat</th>
 <th>Prix Vente</th>
 <th>Quantité</th>
 <th>Catégorie</th>
 <th>Sous Catégorie</th>
 <th>Image</th>
 <th>Images</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="p in Articles" :key="p.id">
 <td>{{p.reference}}</td>
 <td>{{p.designation}}</td>
 <td>{{p.marque}}</td>
 <td>{{p.prixAchat}}</td>
 <td>{{p.prixVente}}</td>
 <td>{{p.qtestock}}</td>
 <td>{{p.categories.nomcategorie}}</td>
 <td>{{p.scategories.nomscategorie}}</td>
 <td><img :src="p.imageartpetitf" :alt=p.designation
width="100"></td>
 <td><div v-for="pg in JSON.parse(p.imageartgrandf)"
:key="pg"><img :src="pg" :alt=p.designation width="70"></div></td>
 <td>
 <button @click.prevent="deleteArticle(p.id)" class="btn
btn-danger">Supprimer</button>
<router-link :to="{name: 'editArticle', params: { id: p.id
}}" class="btn btn-success">Modifier</router-link>
</td>
 </tr>
 </tbody>
 </table>
 </div>
</template>

<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery';
 export default {
 data() {
 return {
 Articles: []
 }
 },
 mounted() {
 this.getArticles();
 },
 methods: {
 deleteArticle(id) {
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/articles/${id}`)
 .then(res => {
 console.log(res)
 this.getArticles();
 })
 .catch(error => {
 console.log(error)
 });
 }
 },
 getArticles(){
 this.axios
 .get('http://localhost:8000/api/articles/')
 .then(response => {
 this.Articles = response.data;
 $(function() {$('#example').DataTable();});
 });
 }
 }
 }
</script>
