function hobbies_list(...list) {
  document.writeln("<ul>");
  for (i = 0; i < list.length;i++) {
    document.writeln("<li>");
    document.write(list[i]);
    document.write("</li>");
  }
  document.writeln("</ul>");
};


