<template>
    <div>
        <ul class="d-flex flex-wrap justify-content-center">
            <li
                v-for="(technology, index) in this.technologies" :key="index"
                class="tech border border-secondary px-3 px-md-5  py-2 mb-3 rounded mr-4"
                :class=" isSelected(technology.id) "
                @click="selectTechnology($event, technology.id)"
            >{{ technology.name }}</li>
        </ul>

        <input type="hidden" name="technologies" id="technologies">
    </div>
</template>

<script>
    export default {
        props: [
            'technologies',
            'project'
        ],
        mounted(){

            this.getProjectTechnologies();

        },
        data(techS){
            return {
                technologiesSelected: new Set(),
                selected: false,
                projectTechs : [],
            }
        },
        methods: {
            selectTechnology(event, technology_id){
                console.log(event.target.textContent);
                console.log(technology_id);
                if( event.target.classList.contains('active') ){
                    // Removing class from dom element
                    event.target.classList.remove('active');
                    // Deleting element fromm technologies set
                    this.technologiesSelected.delete(technology_id);
                }else{
                    // Adding class to element selected
                    event.target.classList.add('active');
                    // Adding element selected to technologies set
                    this.technologiesSelected.add(technology_id);
                }

                const stringTechnologies = [...this.technologiesSelected];
                document.querySelector('#technologies').value = stringTechnologies;
            },
            getProjectTechnologies(){
                // Only when editing some project
                if(this.project){

                    // Getting technologies id belonging to the project
                    this.projectTechs = this.project.map( tech => {
                        return tech.id;
                    });
                    
                    // Filling selected technologies 
                    this.technologiesSelected = new Set(this.projectTechs);
                    const stringTechnologies = [...this.technologiesSelected];
                    document.querySelector('#technologies').value = stringTechnologies;
                }
            },
            isSelected(technology_id){
                // If the technology belongs to the project then show it as active
                if( this.projectTechs.includes(technology_id) ){
                    return 'active'
                }
                return '';
            }
        },
    }
</script>

<style>
    .tech{
        list-style: none;
        cursor: pointer;
    }

    .tech:hover{
        border: 1px solid white!important;
    }

    .active{
        background: white;
        color: black;
        font-weight: bold;
    }
</style>