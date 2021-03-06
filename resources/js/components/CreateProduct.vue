<script>
import axios from 'axios'
import Swal from 'sweetalert2'

export default {
    props:['attrs'],
    data(){
        return {
            product: null,
            activeTab:"general",
            form:{
                name:""
            },
            variationParams:{},
            variations: [],
            possibleVariations: null
        }
    },
    methods:{
        setActiveTab(tab){
            this.activeTab = tab
        },
        saveProduct(){
            axios.post('/admin/products', this.form).then( r => {
                if(r.data.id){
                    this.product = r.data
                }
            }).catch( e => {
                Swal.fire('Something went wrong', '', 'error')
            })
        },
        createVariationModels(){
            if(this.attrs){
                this.attrs.forEach( a => {
                    this.variationParams[a.id] = []
                })
            }
        },
        preGenerateVariations(){
            axios.post('/api/preGetVariations', this.variationParams).then( res => {
                this.possibleVariations = res.data
                Swal.fire({
                    title: this.possibleVariations.length + ' variations will be created.',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: `Create variations`,
                    denyButtonText: `No`,
                    customClass: {
                        cancelButton: 'button button-danger',
                        confirmButton: 'button button-success'
                    }
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('/api/createVariations', {"variations":this.possibleVariations,"product": this.product.id}).then( r => {
                            this.variations = r.data
                            Swal.fire('Done!', '', 'success')    
                        }).catch( err => {
                            Swal.fire('Something went wrong', '', 'error')
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Ok.You the boss.', '', 'info')
                    }
                    })
            }).catch( e => {

            })
        }
    },
    mounted(){
        this.createVariationModels()
    }
}
</script>

<style scoped lang="scss">

</style>