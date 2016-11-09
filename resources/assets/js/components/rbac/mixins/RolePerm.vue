<script>

    export default {

        // Common data for Role and Permission Creator
        data() {
            return {
                name: "",
                display_name: "",
                description: "",

                errors: {},
                errorMessage: "Please, be careful!",

                isLoading: false
            }
        },

        // Common computed property
        computed: {
            isFormFilled() {
                return (this.name.length > 0) && (this.display_name.length > 0);
            }
        },

        // Common form cleaner
        methods: {

            onSubmit() {
                let url = this.getStoreURL();

                let dataToSend = {
                    name: this.name,
                    display_name: this.display_name,
                    description: this.description
                };

                this.isLoading = true;
                this.$http.post(url, dataToSend).then(response => {
                    toastr.success(response.data.message);

                    this.emitCreationEvent(response.data);
                    this.clearForm();

                    this.isLoading = false;
                }, response => {
                    toastr.error(this.errorMessage);

                    this.errors = response.data;
                    this.isLoading = false;
                });
            },

            clearForm() {
                this.errors = {};
                this.name = this.display_name = this.description = "";
            }
        }

    }


</script>