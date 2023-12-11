export class Coctel {
  id;
  nombre;
  imgUrl;

  constructor(id, nombre, imgUrl) {
    this.id = id;
    this.nombre = nombre;
    this.imgUrl = imgUrl;
  }
  getId() {
    return this.id;
  }
  getNombre() {
    return this.nombre;
  }
  getImgUrl() {
    return this.imgUrl;
  }
}
