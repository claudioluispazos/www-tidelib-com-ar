function $(g,y,e={}){const n=document.getElementById(g),u=n.querySelector(".carousel-inner");function v(){if(e.variant==="default"){let i=window.innerHeight;n.style.height=`${i*.2}px`}else e.variant==="most-viewed"&&(e.fixedHeight?n.style.height=`${e.fixedHeight}px`:n.style.height="auto")}function x(){let i=n.clientWidth;if(e.variant==="default"){let l=n.clientHeight,r=e.minWidthPerItem||120,h=e.minHeightPerItem||100,a=Math.floor(i/r),s=Math.floor(l/h);return Math.max(a,s)}else if(e.variant==="most-viewed"){let l=e.minWidthPerItem||55;return Math.floor(i/l)}}function w(i,l){return i.reduce((r,h,a)=>a%l?r:[...r,i.slice(a,a+l)],[])}function f(){u.innerHTML="",v();let i=x(),l=w(y,i),r=100/i;l.forEach((h,a)=>{let s=a===0?"active":"",o=document.createElement("div");o.className=`carousel-item ${s}`;let c=document.createElement("div");c.style.display="flex",c.style.flexWrap="nowrap",c.style.width="100%",c.style.height="100%",h.forEach(d=>{let t=document.createElement("div");t.style.flex=`0 0 ${r}%`,t.style.maxWidth=`${r}%`,t.style.boxSizing="border-box",t.style.display="flex",t.style.flexDirection="column",t.style.justifyContent="center",t.style.alignItems="center",t.style.padding=e.padding||"0.5rem",e.variant==="most-viewed"?t.innerHTML=`
                        <a href="/perfil/descripcion/${d.id}">
                            <img src="${d.imagen_portada}" 
                                 alt="${d.titulo}" 
                                 style="width: ${e.fixedSize||55}px; height: ${e.fixedSize||55}px; object-fit: cover; border-radius: 50%;">
                        </a>
                        <div class="titulo_lateral">${d.titulo}</div>
                    `:t.innerHTML=`
                        <a href="/perfil/descripcion/${d.id}">
                            <img src="${d.imagen_portada}" 
                                 alt="${d.titulo}" 
                                 style="width: 100%; max-height: ${n.clientHeight}px; object-fit: contain;">
                        </a>
                    `,c.appendChild(t)}),o.appendChild(c),u.appendChild(o)})}f();let m;window.addEventListener("resize",()=>{clearTimeout(m),m=setTimeout(f,300)})}window.initializeCarousel=$;
