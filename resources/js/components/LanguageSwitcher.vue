<template>
    <div>
        <el-select @change="languageChanged" v-model="lang" placeholder="Select language">
            <el-option
                v-for="item in langs"
                :key="item.value"
                :label="item.label"
                :value="item.value">
                    <span style="float: left">{{ item.label }}</span>
                    <span style="float: right; color: #8492a6; font-size: 13px">{{ item.value }}</span>
            </el-option>
        </el-select>
    </div>
</template>

<script>
export default {
    props:['allowed','all','current'],
    data(){
        return {
            langs:[],
            lang:""
        }
    },
    methods:{
        languageChanged(){
            axios.post('/api/switchLang', {lang: this.lang}).then( res => {
                window.location.href = res.data
            }).catch( err => {})
        },
        formatLanguages(){
            if(this.allowed.length){
                this.allowed.forEach( element => {
                    this.all.filter( el => {
                        if(el.short == element){
                            this.langs.push({ value: el.short, label: el.native})
                        }
                    })
                });
            }
        },
        setCurrent(){
            if(this.current && this.langs.length){
                this.lang = this.current
            }
        }
    },
    mounted(){
        this.formatLanguages()
        this.setCurrent()
    },
}
</script>

<style scoped lang="scss">

</style>