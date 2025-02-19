import figlet from "figlet";
import chalk from "chalk";

const createFiglet = async (txt) => {
  figlet.text(
    txt,
    {
      font: "3D-ASCII",
      horizontalLayout: "default",
      verticalLayout: "default",
      width: 100,
      whitespaceBreak: true,
    },
    function (err, data) {
      if (err) {
        console.log("Something went wrong...");
        console.dir(err);
        return;
      }
      console.log(chalk.red(data));
    }
  );
};

export default createFiglet;
