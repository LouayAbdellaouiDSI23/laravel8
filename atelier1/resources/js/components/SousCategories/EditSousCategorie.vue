<template lang="">

<form @submit.prevent="modifierScategorie">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" vmodel="SousCategories.nomscategorie">
 </div>
 <div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" @change="onFileChange"
:files="'../storage/images/'+SousCategories.imagescat"/>
</div>
 <div class="form-group">
 Catégories<select class="form-control" vmodel="SousCategories.categorieID">

 <option v-for="c in Categories" :key="c.id"
:value=c.id>{{c.nomcategorie}}</option>
 </select>
 </div>
 <button type="submit" class="btn btn-block btn-primary">Modifier Sous
Catégorie</button>
</form>
</template>
<script>
export default {
 components: {
 },
 data() {
 return {
 SousCategories:[],
 Categories:[]
 }
 },
 methods: {

 modifierScategorie(){
 const scateg = {
 nomscategorie:this.SousCategories.nomscategorie,
 imagescat:this.SousCategories.imagescat,
 categorieID:this.SousCategories.categorieID
 }
 this.axios.put(`http://localhost:8000/api/scategories/${this.$route.params.id}`,scateg)
 .then(() => {
 this.$router.push('/scategories')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.SousCategories.imagescat =
"scategories/"+e.target.files[0].name;
 },
 getCategories(){
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{
 this.Categories = res.data;
 }).catch(error => {
 console.log(error)
 });
 },

 getOneScategorie(){
 this.axios
 .get(`http://localhost:8000/api/scategories/${this.$route.params.id}`)
 .then((res) => {
 this.SousCategories = res.data;
 console.log(this.SousCategories)
 });
 }

 },
 created() {
 this.getCategories();
 this.getOneScategorie();
 }
}
</script>
<style lang="">

</style>