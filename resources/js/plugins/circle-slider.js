//svg item
const leftInitialPath =
  "M76.388 165.94C75.9671 167.043 74.7305 167.599 73.6407 167.145C70.8225 165.972 68.0826 164.618 65.4379 163.094C64.4153 162.504 64.1052 161.184 64.7252 160.18V160.18C65.3453 159.175 66.6606 158.867 67.6844 159.454C70.0989 160.84 72.5974 162.074 75.1655 163.149C76.2544 163.605 76.8088 164.837 76.388 165.94V165.94Z";
const leftFinalPath =
  "M109.06 169.078C109.206 170.25 108.375 171.321 107.2 171.432C93.6719 172.71 80.0591 170.092 67.9701 163.887C66.9199 163.348 66.5455 162.045 67.1157 161.012V161.012C67.686 159.978 68.9849 159.606 70.0361 160.143C81.3332 165.913 94.0386 168.357 106.67 167.188C107.845 167.08 108.914 167.907 109.06 169.078V169.078Z";
const centerInitialPath =
  "M125.951 164.745C126.394 165.839 125.866 167.088 124.759 167.498C121.895 168.556 118.966 169.429 115.99 170.111C114.84 170.375 113.714 169.619 113.485 168.461V168.461C113.256 167.303 114.009 166.182 115.159 165.916C117.872 165.288 120.543 164.492 123.157 163.532C124.265 163.125 125.509 163.651 125.951 164.745V164.745Z";

const centerInitial2 =
  "M95.7646 170.48C95.6822 171.657 94.6605 172.548 93.486 172.431C90.4481 172.127 87.4328 171.628 84.4589 170.937C83.3091 170.67 82.629 169.497 82.9306 168.355V168.355C83.2321 167.214 84.401 166.537 85.5512 166.802C88.2646 167.427 91.0143 167.882 93.7843 168.165C94.9586 168.285 95.8469 169.302 95.7646 170.48V170.48Z";

const centerfinalPath =
  "M124.225 166.48C124.629 167.59 124.057 168.82 122.936 169.19C110.033 173.452 96.1783 173.936 83.0093 170.584C81.8653 170.293 81.2096 169.106 81.535 167.971V167.971C81.8604 166.836 83.0434 166.184 84.1878 166.473C96.4884 169.579 109.42 169.127 121.474 165.171C122.595 164.803 123.821 165.371 124.225 166.48V166.48Z";

const rightInitialPath =
  "M141.502 157.326C142.203 158.276 142.002 159.617 141.031 160.288C138.52 162.024 135.9 163.597 133.187 164.996C132.138 165.537 130.86 165.084 130.35 164.02V164.02C129.84 162.955 130.291 161.682 131.339 161.139C133.811 159.858 136.2 158.424 138.493 156.845C139.465 156.176 140.802 156.376 141.502 157.326V157.326Z";

const rightFinalPath =
  "M141.502 157.326C142.203 158.276 142.002 159.617 141.031 160.288C129.855 168.014 116.698 172.384 103.117 172.88C101.937 172.923 100.973 171.969 100.965 170.789V170.789C100.957 169.609 101.908 168.65 103.087 168.604C115.766 168.116 128.045 164.038 138.493 156.845C139.465 156.176 140.802 156.376 141.502 157.326V157.326Z";

const leftPaginationPath = document.querySelector("#itemLeft");
const centerPaginationPath = document.querySelector("#itemCenter");
const rightPaginationPath = document.querySelector("#itemRight");
const circleSliders = document.querySelector(".circleSliders");

let startX;
let currentRotation = 0; // 0 = center, -1 = left, 1 = right

function handleStart(e) {
  e.preventDefault();
  startX = e.type.includes("mouse") ? e.clientX : e.touches[0].clientX;
}

function handleMove(e) {
  if (!startX) return;
  e.preventDefault();

  const x = e.type.includes("mouse") ? e.clientX : e.touches[0].clientX;
  const diff = startX - x;

  if (Math.abs(diff) > 50) {
    // Threshold for rotation
    if (diff > 0 && currentRotation < 1) {
      rotateRight();
    } else if (diff < 0 && currentRotation > -1) {
      rotateLeft();
    }
    startX = null; // Reset start position after rotation
  }
}

function handleEnd(e) {
  startX = null;
}

function rotateLeft() {
  if (currentRotation === 0) {
    circleSliders.style.transform = "rotate(-58deg)";
    updatePaths("left");
    currentRotation = -1;
  } else if (currentRotation === 1) {
    circleSliders.style.transform = "rotate(0deg)";
    updatePaths("center");
    currentRotation = 0;
  }
}

function rotateRight() {
  if (currentRotation === 0) {
    circleSliders.style.transform = "rotate(58deg)";
    updatePaths("right");
    currentRotation = 1;
  } else if (currentRotation === -1) {
    circleSliders.style.transform = "rotate(0deg)";
    updatePaths("center");
    currentRotation = 0;
  }
}

function updatePaths(position) {
  switch (position) {
    case "left":
      leftPaginationPath.setAttribute("d", leftFinalPath);
      leftPaginationPath.setAttribute("fill", "#FF710F");
      leftPaginationPath.setAttribute("fill-opacity", "1");
      centerPaginationPath.setAttribute("d", centerInitialPath);
      centerPaginationPath.setAttribute("fill", "#141414");
      centerPaginationPath.setAttribute("fill-opacity", "0.16");
      break;
    case "center":
      centerPaginationPath.setAttribute("d", centerfinalPath);
      centerPaginationPath.setAttribute("fill", "#FF710F");
      centerPaginationPath.setAttribute("fill-opacity", "1");
      leftPaginationPath.setAttribute("d", leftInitialPath);
      leftPaginationPath.setAttribute("fill", "#141414");
      leftPaginationPath.setAttribute("fill-opacity", "0.16");
      rightPaginationPath.setAttribute("d", rightInitialPath);
      rightPaginationPath.setAttribute("fill", "#141414");
      rightPaginationPath.setAttribute("fill-opacity", "0.16");
      break;
    case "right":
      rightPaginationPath.setAttribute("d", rightFinalPath);
      rightPaginationPath.setAttribute("fill", "#FF710F");
      rightPaginationPath.setAttribute("fill-opacity", "1");
      centerPaginationPath.setAttribute("d", centerInitial2);
      centerPaginationPath.setAttribute("fill", "#141414");
      centerPaginationPath.setAttribute("fill-opacity", "0.16");
      break;
  }
}

// Mouse event listeners
circleSliders.addEventListener("mousedown", handleStart);
circleSliders.addEventListener("mousemove", handleMove);
circleSliders.addEventListener("mouseup", handleEnd);
circleSliders.addEventListener("mouseleave", handleEnd);

// Touch event listeners
circleSliders.addEventListener("touchstart", handleStart, { passive: false });
circleSliders.addEventListener("touchmove", handleMove, { passive: false });
circleSliders.addEventListener("touchend", handleEnd);
circleSliders.addEventListener("touchcancel", handleEnd);
