library(plyr)
library(dplyr)
library(MPDiR)
library(quickpsy)
library(fitdistrplus)
library(ggplot2)

# source("1-read-files.R") # to read global values
source("~/Desktop/OnlineExperiment/AnalysisScripts/1-read-files.R") # to read global values
# set directory where script is
# sourceDir <- dirname (rstudioapi::getActiveDocumentContext()$path) 
# defaultpath <- sourceDir

#remove(list = ls())
# print(defaultpath)
# setwd(defaultpath)
setwd("~/Desktop/OnlineExperiment/AnalysisScripts/")


for (task in tasks){
  
  filename <- paste("~/Desktop/OnlineExperiment/AnalysisScripts/results/aggregated-",task,".csv",sep="")
  time_table <- read.csv(filename)
  filename_analysis <- paste("~/Desktop/OnlineExperiment/AnalysisScripts/results/time_analysis-",task,sep="")
  
  ### CI analysis
  
  source("~/Desktop/OnlineExperiment/AnalysisScripts/CI-Functions-Bonferroni.R")
  mydata <- time_table
  
  # order for the transpose
  elements <- mydata
  elements <- elements [ order(elements$participant_id, elements$visualization_size), ]
  #
  myvars <- c("participant_id", "visualization_size", "mean_time_taken")
  elements <- elements [myvars]
  #aggregating all cases per participant
  statstable <- ddply(elements,
                      c("participant_id","visualization_size"),
                      summarise,
                      mean_time=mean(mean_time_taken)
  )
  elements <- statstable
  
  #
  elements <- reshape(elements, timevar="visualization_size", idvar=c("participant_id"), direction="wide")
  colnames(elements) <- gsub("mean_time. ", "", colnames(elements))
  
  #############
  # all elements analysis
  #############
  
  data <- elements
  
  techniqueA <- bootstrapMeanCI(data[,sizes[1]]) #0-square
  techniqueB <- bootstrapMeanCI(data[,sizes[2]]) #1-wide
  techniqueC <- bootstrapMeanCI(data[,sizes[3]]) #2-tall
  
  analysisData <- c()
  analysisData$name <- c(sizes[3],sizes[2],sizes[1])
  analysisData$pointEstimate <- c(techniqueC[1], techniqueB[1], techniqueA[1])
  analysisData$ci.max <- c(techniqueC[3], techniqueB[3], techniqueA[3])
  analysisData$ci.min <- c(techniqueC[2], techniqueB[2], techniqueA[2])
  
  datatoprint <- data.frame(factor(analysisData$name),analysisData$pointEstimate, analysisData$ci.min, analysisData$ci.max)
  colnames(datatoprint) <- c("speed", "mean_time", "lowerBound_CI", "upperBound_CI ") #We use the name mean_time for the value of the mean even though it's not a time, it's just to parse the data for the plot
  tmp <- paste(filename_analysis, paste("means-",task,".csv",sep=""), collapse="_")
  write.csv(datatoprint, file=tmp)
  
  ## Code that should print chart
  colnames(datatoprint) <- c("technique", "mean_time", "lowerBound_CI", "upperBound_CI ") #We use the name mean_time for the value of the mean even though it's not a time, it's just to parse the data for the plot
  barChart(datatoprint,analysisData$name ,nbTechs = 3, ymin = 0, ymax = 3000, "", "")
  # barChart(datatoprint,analysisData$name ,nbTechs = 3, ymin = 0, ymax = 50, "", "") #for seconds
  ggsave(paste("~/Desktop/OnlineExperiment/AnalysisScripts/plots/time-means-",task,".pdf",sep=""),device = "pdf", width=5, height=2)
  
  
  
  # CIs with adapted alpha value for multiple comparisons
  
  diffAB = bootstrapMeanCI_corr(data[,sizes[1]] - data[,sizes[2]], 3) # 0-static - 1-slow
  diffCB = bootstrapMeanCI_corr(data[,sizes[3]] - data[,sizes[2]], 3) # 2-fast - 1-slow
  diffCA = bootstrapMeanCI_corr(data[,sizes[3]] - data[,sizes[1]], 3) # 2-fast - 0-static
  
  analysisData <- c()
  analysisData$name <- c(paste(sizes[3], sizes[1], sep=" - "), # 2-fast - 0-static
                         paste(sizes[3], sizes[2], sep=" - "), # 2-fast - 1-slow
                         paste(sizes[1], sizes[2], sep=" - ")) # 0-static - 1-slow
  analysisData$pointEstimate <- c(diffCA[1], diffCB[1], diffAB[1])
  analysisData$ci.max <- c(diffCA[3], diffCB[3], diffAB[3])
  analysisData$ci.min <- c(diffCA[2], diffCB[2], diffAB[2])
  analysisData$level <- c(diffCA[4], diffCB[4], diffAB[4])
  analysisData$ci_corr.max <- c(diffCA[6], diffCB[6], diffAB[6])
  analysisData$ci_corr.min <- c(diffCA[5], diffCB[5], diffAB[5])
  
  datatoprint <- data.frame(factor(analysisData$name), analysisData$pointEstimate, analysisData$ci.max, analysisData$ci.min, analysisData$level, analysisData$ci_corr.max, analysisData$ci_corr.min)
  colnames(datatoprint) <- c("current_speed", "mean_time", "upperBound_CI","lowerBound_CI", "corrected_CI", "upperBound_CI_corr", "lowerBound_CI_corr") #We use the name mean_time for the value of the mean even though it's not a time, it's just to parse the data for the plot
  tmp <- paste(filename_analysis, paste("diffs-",task,".csv",paste=""), collapse="_")
  write.csv(datatoprint,file=tmp)
  
  ## Code that should print chart
  colnames(datatoprint) <- c("technique", "mean_time", "lowerBound_CI", "upperBound_CI", "corrected_CI","lowerBound_CI_corr","upperBound_CI_corr") #We use the name mean_time for the value of the mean even though it's not a time, it's just to parse the data for the plot
  barChart_corr(datatoprint, analysisData$name, nbTechs = 3, ymin = -4000, ymax = 4000, "", "")
  # barChart_corr(datatoprint, analysisData$name, nbTechs = 3, ymin = -30, ymax = 30, "", "") #for seconds
  ggsave(paste("~/Desktop/OnlineExperiment/AnalysisScripts/plots/time-diffs-",task,".pdf",sep=""),device = "pdf", width=5, height=2)
  
}