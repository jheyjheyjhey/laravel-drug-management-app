<template>
    <div>
        <div class="row">
            <!-- Number of Patients On-Process -->
            <div class="col-sm-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <h2 class="display-2">{{ patient-count }}</h2>
                        <h2>Patient(s)</h2>
                        <hr>
                        <button class="btn btn-default">Add Patient</button>
                    </div>
                </div>
            </div>

            <!-- Product On-stock -->
            <div class="col-sm-6">
                <div class="card card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <h2 class="display-2">1</h2>
                        <h2>Drug(s) on Stock</h2>
                        <hr>
                        <button class="btn btn-default">Add Drug</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted () {
        console.log('dashboard mounted');
    },

    props: ['patient-count']
}
</script>

<style>

</style>
