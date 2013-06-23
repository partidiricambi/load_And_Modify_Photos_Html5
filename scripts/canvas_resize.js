      function loadImages(sources, callback) {
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        for(var src in sources) {
          numImages++;
        }
        for(var src in sources) {
          images[src] = new Image();
          images[src].onload = function() {
            if(++loadedImages >= numImages) {
              callback(images);
            }
          };
          images[src].src = sources[src];
        }
      }
      function addAnchor(group, x, y, name) {
        var stage = group.getStage();
        var layer = group.getLayer();

        var anchor = new Kinetic.Circle({
          x: x,
          y: y,
          strokeWidth: 0,
          radius: 10,
          name: name,
          draggable: true
        });

        anchor.on("dragmove", function() {
          update(group, this);
          layer.draw();
        });
        anchor.on("mousedown touchstart", function() {
          group.setDraggable(false);
          this.moveToTop();
        });
        anchor.on("dragend", function() {
          group.setDraggable(true);
          layer.draw();
        });
        // add hover styling
        anchor.on("mouseover", function() {
          var layer = this.getLayer();
          document.body.style.cursor = "pointer";
          this.setStrokeWidth(4);
		  layer.draw();
        });
        anchor.on("mouseout", function() {
          var layer = this.getLayer();
          document.body.style.cursor = "default";
          this.setStrokeWidth(0);
          layer.draw();
        });

        group.add(anchor);
      }
      function update(group, activeAnchor) {
        var topLeft = group.get(".topLeft")[0];
        var topRight = group.get(".topRight")[0];
        var bottomRight = group.get(".bottomRight")[0];
        var bottomLeft = group.get(".bottomLeft")[0];
        var image = group.get(".image")[0];

        // update anchor positions
        switch (activeAnchor.getName()) {
          case "topLeft":
            topRight.attrs.y = activeAnchor.attrs.y;
            bottomLeft.attrs.x = activeAnchor.attrs.x;
            break;
          case "topRight":
            topLeft.attrs.y = activeAnchor.attrs.y;
            bottomRight.attrs.x = activeAnchor.attrs.x;
            break;
          case "bottomRight":
            bottomLeft.attrs.y = activeAnchor.attrs.y;
            topRight.attrs.x = activeAnchor.attrs.x;
            break;
          case "bottomLeft":
            bottomRight.attrs.y = activeAnchor.attrs.y;
            topLeft.attrs.x = activeAnchor.attrs.x;
            break;
        }

        image.setPosition(topLeft.attrs.x, topLeft.attrs.y);

        var width = topRight.attrs.x - topLeft.attrs.x;
        var height = bottomLeft.attrs.y - topLeft.attrs.y;
        if(width && height) {
          image.setSize(width, height);
        }
      }
      function initStage(images) {
        var stage = new Kinetic.Stage({
          container: "container",
          width: 640,
          height: 476
        });
        var theW = parseInt(localStorage.getItem("imageWidth"));
        var theH = parseInt(localStorage.getItem("imageHeight"));

        var bgGroup = new Kinetic.Group({
          x: 0,
          y: 0,
          draggable: false
        });

        var fgGroup = new Kinetic.Group({
          x: 100,
          y: 100,
          draggable: true
        });

        var layer = new Kinetic.Layer();

        layer.add(bgGroup);
        layer.add(fgGroup);
        stage.add(layer);

        // Background image
        var bgImg = new Kinetic.Image({
          x: 0,
          y: 0,
          image: images.myBg,
          width: 640,
          height: 476,
          name: "image"
        });

        bgGroup.add(bgImg);

        // Uploaded Image
        var myNewImg = new Kinetic.Image({
          x: 0,
          y: 0,
          image: images.myImage,
		  width: theW,
		  height: theH,
          name: "image"
        });

        fgGroup.add(myNewImg);
        addAnchor(fgGroup, 0, 0, "topLeft");
        addAnchor(fgGroup, theW, 0, "topRight");
        addAnchor(fgGroup, theW, theH, "bottomRight");
        addAnchor(fgGroup, 0, theH, "bottomLeft");

        fgGroup.on("dragstart", function() {
          this.moveToTop();
        });

        stage.draw();
      }

