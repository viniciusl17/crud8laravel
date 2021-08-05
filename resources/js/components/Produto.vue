<template>
    <div id=" ">
      <button @click="modificar=false;  abrirModal();" type="button" class="btn btn-success" my-4> Novo </button>

<!-- O Modal -->
<div class="modal" :class="{mostrar:modal}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Cabeçalho do Modal -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="fecharModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          
        
      </div>

      <!-- parte de baixo do modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secundary" data-dismiss="modal">Salvar</button>
        <button @click="fecharModal();" type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<hr>
<!-- Final do Modal -->

    <div id="titleProduto">
      <span>Gerenciar Produto</span>
    
     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
    </div>
      <!-- Aqui Temos a Tabela a ser exibida -->

 <table class="table">
        <thead class="thead-light">
          <tr>
            <th>
               <input type="checkbox"/>
            </th>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Categoria</th>
            <th scope="col">Status</th>
            <th scope="col">#</th>
          </tr>
        </thead>
    <tbody>
          <tr v-for="produto in produtos" :key="produto.id">            
            <th>
                <label>
                <input type="checkbox"/>
                <span></span>
              </label>
            </th>
            <td>{{produto.codigo}}</td>
            <td>{{produto.nome}}</td>
            <td>{{produto.preco}}</td>
            <td>{{produto.categoria}}</td>
            <td>{{produto.status}}</td>
            <td> 
                <button @click="modificar=true; abrirModal(produto.id);" class="btn btn-success">E</button>
                <button v-on:click="deletar(produto.id)" class="btn btn-danger">D</button>
            </td>
           </tr>          
    </tbody>
 </table>
  </div>
</template>
<!-- Final do Template -->

<!-- Início do Script -->
<script>
export default {
    data() {
        return{

            modificar:true,
            modal:0,
            tituloModal:'',
            produtos:[],
        }
    },
    methods: {
      async mostrar (){
           const res= await axios.get('/produtos');
            this.produtos= res.data;
      },
    
      async deletar (id){
           const res=await axios.delete('/produtos/'+id);
           this.mostrar();
            
      }, 
      
      abrirModal(){
          this.modal=1;
          if(this.modificar){
            this.tituloModal="Modificar Produto";
          }else{
              this.tituloModal="Criar Produto";

          }
      },
      fecharModal(){
          this.modal=0;
      },
    },
    //Aqui termina o Método
    
    created(){
        this.mostrar();
    },                                          
   
}
</script>
<!-- Final do Script -->

<!-- Início dos Estilos -->
<style>

.mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(36, 36, 36, 0.158);
}

#pesquisar{
  display: flex;
  margin-left: auto;
}


#titleProduto{
  background-color: rgba(221, 220, 220, 0.356);
  border: 1px solid rgba(172, 171, 171, 0.438);
  padding: 15px;
  border-radius: 4px;
  margin-top: 15px;
  justify-content: space-between;
  display: flex;
  align-items: center;
}


</style>