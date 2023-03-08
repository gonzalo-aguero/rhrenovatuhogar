<div x-data="{
        loadingProducts: ()=>{
            return $store.products.length == 0;
        }
    }" class="w-full flex flex-col items-center justify-center py-10">
    <template x-for="category in $store.sortedProducts">
        <div x-data="{ open: false }" class="block w-5/6 bg-white rounded shadow-lg">
            <h2 x-text="category.category" class="text-center py-3 text-xl uppercase cursor-pointer text-orange font-bold" @click="open = !open"></h2>
            <div class="flex gap-2 justify-left w-full overflow-auto p-2 dropdown_menu-6 bg-gray-light" x-show="open">
               <template x-for="i in 5">
                    {{-----------------------
                        Product card template
                    ---------------------------}}
                    <div class="bg-gray-light text-black w-40 rounded shadow-lg border-t-0 border border-gray-light-transparent shrink-0"
                        x-data="{
                            product: category.products[i],
                            units: 1,
                            get squareMeters() {
                                if(this.units >= 0) return (this.units * product.m2ByUnit).toPrecision(3);
                                else return 0;
                            },
                            defaultImage(){
                                return product.thumbnail !== null ? product.thumbnail :'{{asset('images/defaultImage.svg')}}';
                            },
                            productPage(){
                                let url ='producto/' + product.name;
                                url = url.replace(/ /g, '-').toLowerCase();
                                return url;
                            },
                            {{-- Measurable per square meter--}}
                            squareMeter: (product.m2Price != null && product.m2ByUnit != null)
                        }">
                        <div class="shrink-0 mb-2">
                            <a :href="productPage">
                                <img class="h-40 w-full" :src="defaultImage" :alt="product.name" :title="product.description">
                            </a>
                        </div>
                        <h3 class="text-center text-sm font-medium mb-1"><a :href="productPage" x-text="product.name"></a></h3>
                        <div class="text-center font-light flex-col items-center">
                            <!-- Primary price -->
                            <span class="text-base" x-text="'$' + product.price"></span>
                            <!-- Secondary price -->
                            <span class="text-xs" x-text="'$' + product.m2Price + '/m²'" x-show="squareMeter"></span>
                        </div>
                        <!-- Add to cart functionalities -->
                        <div class="flex flex-col w-full items-center pt-2 pb-3">
                            <div class="flex w-full justify-center items-center gap-1">
                                <input type="number" min="1" x-model="units" class="block w-12 text-sm rounded border border-gray-light2 text-center" x-model="units"/>
                                <span class="text-xs font-light">Unidades</span>
                            </div>
                            <div class="text-xs font-normal" x-show="squareMeter">
                                <span class="text-sm">=</span>
                                <span x-text="squareMeters"></span>
                                <span>m²</span>
                            </div>
                            <button class="bg-orange-light text-white text-sm p-1 mt-2 rounded active:opacity-80 hover:opacity-80">Añadir al carrito</button>
                        </div>
                    </div>
                    {{---------------------------
                        END Product card template
                    -------------------------------}}
                </template>
            </div>
        </div>
     </template>
    @for ($i = 0; $i < 10; $i++)
        <template x-if="loadingProducts">
            <x-product.loading-product-card></x-product.loading-product-card>
        </template>
    @endfor
</div>
