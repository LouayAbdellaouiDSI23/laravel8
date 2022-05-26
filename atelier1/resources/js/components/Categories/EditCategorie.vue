<template lang="">

<form @submit.prevent="modifierCategorie">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" vmodel="Categorie.nomcategorie">
 </div>
 <div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" @change="onFileChange">
</div>

 <button type="submit" class="btn btn-block btn-primary">Modifier
Catégorie</button>
</form>
</template>
<script>
export default {
 data() {
 return {
 Categorie:[]
 }
 },
 mounted (){
 this.getOneCategorie() ;
 },
 methods: {

 modifierCategorie(){
 const categ = {
 nomcategorie:this.Categorie.nomcategorie,
 imagecategorie:this.Categorie.imagecategorie
 }
 this.axios.put(`http://localhost:8000/api/categories/${this.$route
.params.id}`,categ)
 .then(() => {
 this.$router.push('/categories')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Categorie.imagecategorie =
"categories/"+e.target.files[0].name;
 },
 getOneCategorie(){
 this.axios
 .get(`http://localhost:8000/api/categories/${this.$route.params.id}`)
 .then((res) => {
 this.Categorie = res.data;
 });
 }
 }
}
</script>
<style lang="">

</style>