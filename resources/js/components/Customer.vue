<script>
import axios from 'axios'
export default {
    props:['countries','customer'],
    data(){
        return {
            selectedCountry:"",
            selectedState:"",
            selectedCity:"",
            states:[],
            cities:[]
        }
    },
    methods:{
        getStates(){
            axios.get('/api/getStates/'+ this.selectedCountry).then( res => {
                this.states = res.data
                if(this.customer.profile.state_id && this.customer.profile.city_id){
                    this.selectedState = this.customer.profile.state_id
                    this.getCities()
                }
            }).catch( err => {

            })
        },
        getCities(){
            axios.get('/api/getCities/'+ this.selectedState).then( res => {
                this.cities = res.data
                if(this.customer.profile.city_id){
                    this.selectedCity = this.customer.profile.city_id
                }
            }).catch( err => {
                
            })
        }
    },
    mounted(){
        if(this.customer && this.customer.profile){
            if(this.customer.profile.country_id) this.selectedCountry = this.customer.profile.country_id
            if(this.customer.profile.country_id && this.customer.profile.state_id){
                this.getStates()
            }
        }
    }
}
</script>

<style scoped lang="scss">
    
</style>