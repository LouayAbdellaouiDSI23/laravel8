<template>
 <div>

 <h2 class="text-center">Liste des catégories</h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Catégorie</th>
 <th>Image</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="cat in Categories" :key="cat.id">
 <td>{{cat.nomcategorie}}</td>
 <td><img :src="'../storage/images/'+cat.imagecategorie"
:alt=cat.nomcategorie width="170"></td>
 <td>
 <button @click.prevent="deleteCategorie(cat.id)"
class="btn btn-danger">Supprimer</button>
<router-link :to="{name: 'editCategorie', params: { id: cat.id }}" class="btn
btn-success">Modifier </router-link>
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
 Categories: []
 }
 },
 mounted() {
 this.getCategories();
 },
 methods: {
 deleteCategorie(id) {
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/categories/${id}`)
 .then(res => {
 console.log(res)
 this.getCategories();
 })
 .catch(error => {
 console.log(error)
 });
 }
 },
 getCategories(){
 this.axios
 .get('http://localhost:8000/api/categories')
 .then(response => {
 this.Categories = response.data;
 $(function() {$('#example').DataTable();});
 });
 }
 }
 }
</script>