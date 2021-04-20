<template>
  <div id="customer">
    <button @click="getLocation()">Location</button>
  </div>
</template>

<script>
export default {
  name: "CustomerLayout",
  data() {
    return {};
  },
  methods: {
    getLocation() {
      navigator.geolocation.getCurrentPosition(function(position) {
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
        let lat1 = 21.0603335;
        let log1 = 105.7826151;
        let lat2 = 21.0403401;
        let log2 = 105.7880043;
        var pi = Math.PI;

        let deglat1 = lat1 * (pi/180);
        let deglog1 = log1 * (pi/180);
        let deglat2 = lat2 * (pi/180);
        let deglog2 = log2 * (pi/180);

        let difflat = deglat2 - deglat1;
        let difflog = deglog2 - deglog1;

        let val = Math.pow(Math.sin(difflat/2),2)+Math.cos(deglat1)*Math.cos(deglat2)*Math.pow(Math.sin(difflog/2),2);
        let res = 6378.8 * (2 * Math.asin(Math.sqrt(val))); //for kilometers

        console.log(res);
      }, function(err) {
        console.log(err);
      });
    }
  }
};
</script>
