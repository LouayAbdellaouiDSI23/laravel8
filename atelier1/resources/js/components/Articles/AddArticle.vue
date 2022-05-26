<template lang="">
<form @submit.prevent="ajouterproduit">

 <div class="form-group">
 <input type="text" class="form-control" placeholder="reference" vmodel="reference">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="designation" vmodel="designation">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="marque" vmodel="marque">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="caracteristiques" vmodel="caracteristiques">
 </div>
 <div class="form-group">
 <input type="number" class="form-control" placeholder="prixAchat" vmodel="prixAchat">
 </div>
 <div class="form-group">
 <input type="number" class="form-control" placeholder="prixVente" vmodel="prixVente">
 </div>
 <div class="form-group">
 <input type="number" class="form-control" placeholder="prixSolde" vmodel="prixSolde">
 </div>
 <div class="form-group">
 <input type="number" class="form-control" placeholder="qtestock" vmodel="qtestock">
 </div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="categorie"
@change="getscategories($event)" >
 <option v-for="c in Categories" :key="c.id"
:value=c.id>{{c.nomcategorie}}</option>
 </select>
 </div>
 <div class="form-group">
 Sous Catégories<select class="form-control" v-model="scategorie">
 <option v-for="sc in Scategories" :key="sc.id"
:value=sc.id>{{sc.nomscategorie}}</option>
 </select>
 </div>
 <div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" @change="onFileChange"/>
</div>
 <div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" ref="pond" @change="onFileChangeM" @removefile
="onRemoveFileClick"/>
</div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter
Produit</button>
</form>
</template>

<script>


export default {
 name: 'app',
 components: {
 
 },
 data() {
 return {
 tab:[],
 id:"",
 reference: "",
 designation: "",
 marque: "",
 caracteristiques: "",
 prixAchat: "",
 prixVente: "",
 prixSolde:"",
 qtestock: "",
 imageartpetitf: "",
 imageartgrandf:[],
 categorie:"",
 scategorie:"",
 Categories:[],
 Scategories:[],

 }
 },
 methods: {

 ajouterproduit(){
 const pr = {
 reference:this.reference,
 designation:this.designation,
 marque:this.marque,
 caracteristiques:this.caracteristiques,
 prixAchat:this.prixAchat,
 prixVente:this.prixVente,
 prixSolde:this.prixSolde,
 qtestock:this.qtestock,
 categorieID:this.categorie,
 scategorieID:this.scategorie,
 imageartpetitf:this.imageartpetitf,
 imageartgrandf:this.imageartgrandf
 }

 this.axios.post("http://localhost:8000/api/articles",pr)
 .then(() => {
 this.$router.push('/articles')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imageartpetitf =
'../storage/images/'+e.target.files[0].name;

 },
 onFileChangeM (e) {
 this.tab.push('../storage/images/'+e.target.files[0].name)
 this.imageartgrandf=JSON.stringify(this.tab);
 },
 onRemoveFileClick(...e){
 let imag= '../storage/images/'+e[1].filename;
 var index = this.tab.map((val)=> {return val }).indexOf(imag);
 console.log(index)
 this.tab.splice(index,1);
 this.imageartgrandf=JSON.stringify(this.tab);
 },
 getscategories(event){
 let categ=event.target.value;
 this.axios.get('http://localhost:8000/api/scat/'+categ).then(res =>
{
 this.Scategories = res.data;
 }).catch(error => {
 console.log(error)
 });
 }
 },
 created() {
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{
 this.Categories = res.data;
 }).catch(error => {
 console.log(error)
 });
 },
}
</script>
<style lang="">

</style>
