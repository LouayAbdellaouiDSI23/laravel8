<template lang="">

<form @submit.prevent="ajouterScategorie">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" vmodel="nomscategorie">
 </div>
 <div class="form-group">
<input type="file" class="form-control"
placeholder="Image" @change="onFileChange">
</div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="categorieID">
 <option v-for="c in Categories" :key="c.id"
:value=c.id>{{c.nomcategorie}}</option>
 </select>
 </div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter Sous
Catégorie</button>
</form>
</template>
<script>
export default {
 components: {

 },
 data() {
 return {
 nomscategorie: "",
 imagescat: "",
 categorieID:"",
 Categories:[]
 }
 },
 methods: {

 ajouterScategorie(){
 const scateg = {
 nomscategorie:this.nomscategorie,
 imagescat:this.imagescat,
 categorieID:this.categorieID
 }
 this.axios.post("http://localhost:8000/api/scategories",scateg)
 .then(() => {
 this.$router.push('/scategories')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagescat = "scategories/"+e.target.files[0].name;
 },
 getCategories(){
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{
 this.Categories = res.data;
 }).catch(error => {
 console.log(error)
 });
 }

 },
 created() {
 this.getCategories();
 }
}
</script>
<style lang="">

</style>
