<template>
  <div class="container-fluid">
    <Topbar />    
        <navigation   /> 
        <Mainbody  />

  </div>  
</template> 
 
<script> 

  import navigation from './admin/navbars/Navbar';
  import Mainbody from './admin/body/Body';
  import Topbar from './admin/topbar/Topbar';
  export default {
      name: 'Home',
      components:{
        navigation,
        Mainbody, 
        Topbar
      } 
  }
</script>
