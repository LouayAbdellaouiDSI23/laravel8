<template lang="">

<form @submit.prevent="ajouterCategorie">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" vmodel="nomcategorie">
 </div>
 <div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" @change="onFileChange">
</div>

 <button type="submit" class="btn btn-block btn-primary">Ajouter
Catégorie</button>
</form>
</template>
<script>
export default {
 data() {
 return {
 nomcategorie: "",
 imagecategorie: "",
 }
 },
 methods: {

 ajouterCategorie(){
 const categ = {
 nomcategorie:this.nomcategorie,
 imagecategorie:this.imagecategorie
 }
 this.axios.post("http://localhost:8000/api/categories",categ)
 .then(() => {
 this.$router.push('/categories')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagecategorie = "categories/"+e.target.files[0].name;
 }
 }
}
</script>
<style lang="">

</style>