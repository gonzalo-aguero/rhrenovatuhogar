async function r(o){o.preventDefault(),Alpine.store("tried",!0);const t=document.getElementById("ajax-form"),i="excel-conversion",n=new FormData;n.append("_token",t._token.value),await fetch(i,{body:n,method:"POST"}).then(e=>e.json()).then(e=>{console.log(e),Alpine.store("conversion",e.conversion)})}document.addEventListener("alpine:init",()=>{Alpine.store("convert",r),Alpine.store("tried",!1),Alpine.store("conversion",!1)});