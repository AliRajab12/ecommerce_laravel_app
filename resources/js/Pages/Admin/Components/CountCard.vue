<template>
    <div class='flex flex-wrap  justify-center items-center w-full  p-5 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
        <div class="flex justify-between w-full">
            <div>
                <div class="p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>
                </div>
            </div>
            <div>
            <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                class="flex items-center text-xs px-3 bg-blue-200 text-blue-800 rounded-full">100%</div>
        </div>
    </div>
    <div class="text-center">
        <div class="font-bold text-5xl">
            {{ numOfItems }}
        </div>
        <div class="font-bold text-sm">
            {{ title }}
        </div>
    </div>
    </div>

</template>
<script setup>


defineProps({
    title: String,
    numOfItems: Number,
    color: String
})
</script>
