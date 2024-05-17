import cv2
import sys
import numpy as np

def detect_objects(image_path, text_file_path):
    try:
        # Load YOLO
        net = cv2.dnn.readNet("yolov3.weights", "yolov3.cfg")
        classes = []
        with open("coco.names", "r") as f:
            classes = [line.strip() for line in f.readlines()]

        layer_names = net.getLayerNames()
        output_layers = net.getUnconnectedOutLayersNames()

        # Read image
        img = cv2.imread(image_path)
        
        # Check if the image is not in RGB format and convert it
        if img is not None and len(img.shape) == 3 and img.shape[2] == 3:
            if img.shape[2] == 3 and img.shape[2] != 3:  # Check if not in RGB format
                img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

        height, width, channels = img.shape

        # Detecting objects
        blob = cv2.dnn.blobFromImage(img, 0.00392, (416, 416), (0, 0, 0), True, crop=False)
        net.setInput(blob)
        outs = net.forward(output_layers)

        # Get information about detected objects
        class_ids = []
        confidences = []
        boxes = []
        for out in outs:
            for detection in out:
                scores = detection[5:]
                class_id = int(scores.argmax())
                confidence = scores[class_id]
                if confidence > 0.5:
                    # Object detected
                    center_x = int(detection[0] * width)
                    center_y = int(detection[1] * height)
                    w = int(detection[2] * width)
                    h = int(detection[3] * height)

                    # Rectangle coordinates
                    x = int(center_x - w / 2)
                    y = int(center_y - h / 2)

                    boxes.append([x, y, w, h])
                    confidences.append(float(confidence))
                    class_ids.append(class_id)

        # Draw bounding boxes
        indexes = cv2.dnn.NMSBoxes(boxes, confidences, 0.5, 0.4)
        font = cv2.FONT_HERSHEY_PLAIN
        colors = [(0, 255, 0), (0, 0, 255), (255, 0, 0)]

        # Rewrite the image with bounding boxes
        for i in range(len(boxes)):
            if i in indexes:
                x, y, w, h = boxes[i]
                label = str(classes[class_ids[i]])
                color = colors[i % len(colors)]
                cv2.rectangle(img, (x, y), (x + w, y + h), color, 2)
                cv2.putText(img, label, (x, y + 30), font, 1, color, 2)

        # Save the processed image
        cv2.imwrite(image_path, img)

        # Write the names of detected objects to a text file
        with open(text_file_path, "a") as txt_file:
            for i in indexes:
                label = str(classes[class_ids[i]])
                txt_file.write(label + "\n")

        return True  # Return True if everything goes right

    except Exception as e:
        print(f"Error: {e}")
        return False  # Return False if an exception occurs

# Example usage
# if __name__ == "__main__":

image_file_path = sys.argv[1]
text_file_path = sys.argv[2]

    # Perform object detection and store results
detect_objects(image_file_path, text_file_path)


