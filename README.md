# Image-Object-Detection
OpenVision is an advanced image detection system that seamlessly analyzes visuals, empowering users with precise insights and intelligent object recognition. It leverages sophisticated algorithms for intelligent object recognition and analysis.

## Features

### Image Upload 
Users can upload images for object detection. This feature is implemented in photo.php and the image processing is done in object.php.
### Webcam Image Upload
Users can also upload images directly from their webcam. This feature is implemented in camera.php.
### Object Detection
OpenVision employs smart algorithms for precise object recognition through deep learning, streamlining image analysis effortlessly. The object detection is done using a Python script yolo.py called from the PHP script.

## How to Use
1. Open the project on a web server that supports PHP.
2. Navigate to the index.php page.
3. Choose to upload an image from your device or use the webcam to capture an image.
4. The system will process the image and identify objects in it.

## Requirements
1. PHP 7.4 or higher
2. Python 3.6 or higher
3. YOLO (You Only Look Once) real-time object detection system

## Contributing
Just to let you know, pull requests are welcome. For major changes, please open an issue first to discuss what you want to change.

## NOTE
The Yolo weights file has not been uploaded here due to its large size. to use this project, you will have to download yolo weights file
